<?php
namespace IonAuth\Database\Migrations;

/**
 * CodeIgniter IonAuth
 *
 * @package CodeIgniter-Ion-Auth
 * @author  Donatas Glodenis
 * @license https://opensource.org/licenses/MIT	MIT License
 * @link    http://github.com/benedmunds/CodeIgniter-Ion-Auth
 */

/**
 * Create the remember-tokens table.
 *
 * Before this migration Ion Auth stored exactly one remember-me token per user
 * in users.remember_selector / users.remember_code, so logging in from a second
 * browser overwrote the first token.
 *
 * Existing tokens are copied into the new table unchanged (same selector and
 * validator hash), which means cookies issued before the upgrade keep working.
 * The legacy columns are intentionally NOT cleared here, so older code and a
 * rolling deployment continue to work.
 *
 * @package CodeIgniter-Ion-Auth
 */
class CreateUsersRememberTokens extends \CodeIgniter\Database\Migration
{
	/**
	 * Tables
	 *
	 * @var array
	 */
	private $tables;

	/**
	 * Construct
	 */
	public function __construct()
	{
		$config = config('IonAuth');

		// initialize the database; an empty value means "use the default group"
		$databaseGroup = trim((string) $config->databaseGroupName);
		if ($databaseGroup !== '')
		{
			$this->DBGroup = $databaseGroup;
		}

		parent::__construct();

		$this->tables = $config->tables;
	}

	/**
	 * Up
	 *
	 * @return void
	 */
	public function up()
	{
		$table = $this->tableName();

		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user_id' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => true,
			],
			'selector' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'validator_hash' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => true,
			],
			'expires_at' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => true,
				'null'       => true,
			],
			'last_used_at' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => true,
				'null'       => true,
			],
			'user_agent' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => true,
			],
			'ip_address' => [
				'type'       => 'VARCHAR',
				'constraint' => '45',
				'null'       => true,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('selector');
		$this->forge->addKey('user_id');
		$this->forge->addKey('expires_at');
		$this->forge->createTable($table, true);

		$this->copyLegacyTokens($table);
	}

	/**
	 * Down
	 *
	 * Restores the newest token of every user in the legacy columns and drops
	 * the table. Older Ion Auth versions can then keep using those tokens.
	 *
	 * @return void
	 */
	public function down()
	{
		$table = $this->tableName();

		if (! $this->db->tableExists($table))
		{
			return;
		}

		$rows = $this->db->table($table)
						 ->orderBy('created_at', 'DESC')
						 ->orderBy('id', 'DESC')
						 ->get()
						 ->getResult();

		$restored = [];

		foreach ($rows as $row)
		{
			$userId = (int) $row->user_id;

			if (isset($restored[$userId]))
			{
				continue;
			}

			// Do not restore expired tokens.
			if (! empty($row->expires_at) && (int) $row->expires_at <= time())
			{
				continue;
			}

			$restored[$userId] = true;

			$this->db->table($this->tables['users'])
					 ->where('id', $userId)
					 ->update([
						 'remember_selector' => $row->selector,
						 'remember_code'     => $row->validator_hash,
					 ]);
		}

		$this->forge->dropTable($table, true);
	}

	/**
	 * Copy the single legacy token of every user into the new table.
	 *
	 * Expiration is set to NULL: the original cookie expiry is not stored in
	 * the database and must not be shortened.
	 *
	 * @param string $table Remember-tokens table name
	 *
	 * @return void
	 */
	private function copyLegacyTokens(string $table)
	{
		$usersTable = $this->tables['users'];

		if (! $this->db->tableExists($usersTable))
		{
			return;
		}

		$rows = $this->db->table($usersTable)
						 ->select('id, remember_selector, remember_code, last_login')
						 ->where('remember_selector IS NOT NULL', null, false)
						 ->where('remember_code IS NOT NULL', null, false)
						 ->get()
						 ->getResult();

		foreach ($rows as $row)
		{
			$exists = $this->db->table($table)
							   ->where('selector', $row->remember_selector)
							   ->countAllResults();

			if ($exists !== 0)
			{
				continue;
			}

			$this->db->table($table)->insert([
				'user_id'        => (int) $row->id,
				'selector'       => $row->remember_selector,
				'validator_hash' => $row->remember_code,
				'created_at'     => ! empty($row->last_login) ? (int) $row->last_login : time(),
				'expires_at'     => null,
			]);
		}
	}

	/**
	 * Remember-tokens table name.
	 *
	 * @return string
	 */
	private function tableName(): string
	{
		return isset($this->tables['remember_tokens'])
			? $this->tables['remember_tokens']
			: 'users_remember_tokens';
	}
}
