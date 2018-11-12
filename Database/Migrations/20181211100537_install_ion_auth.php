<?php
namespace IonAuth\Database\Migrations;

/**
 * CodeIgniter IonAuth
 *
 * @package CodeIgniter-Ion-Auth
 * @author  Benoit VRIGNAUD <benoit.vrignaud@zaclys.net>
 * @license https://opensource.org/licenses/MIT	MIT License
 * @link    http://github.com/benedmunds/CodeIgniter-Ion-Auth
 */

/**
 * Migration class
 *
 * @package CodeIgniter-Ion-Auth
 */
class Migration_Install_ion_auth extends \CodeIgniter\Database\Migration
{
	/**
	 * Tables
	 *
	 * @var array
	 */
	private $tables;

	/**
	 * Construct
	 *
	 * @return void
	 */
	public function __construct()
	{
		$config = config('IonAuth');

		// initialize the database
		$this->DBGroup = empty($config->databaseGroupName) ? '' : $config->databaseGroupName;

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
		// Drop table 'groups' if it exists
		$this->forge->dropTable($this->tables['groups'], true);

		// Table structure for table 'groups'
		$this->forge->addField([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'description' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable($this->tables['groups']);

		// Dumping data for table 'groups'
		$data = [
			[
				'name'        => 'admin',
				'description' => 'Administrator',
			],
			[
				'name'        => 'members',
				'description' => 'General User',
			],
		];
		$this->db->table($this->tables['groups'])->insertBatch($data);

		// Drop table 'users' if it exists
		$this->forge->dropTable($this->tables['users'], true);

		// Table structure for table 'users'
		$this->forge->addField([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'ip_address' => [
				'type'       => 'VARCHAR',
				'constraint' => '45',
			],
			'username' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'password' => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
			],
			'email' => [
				'type'       => 'VARCHAR',
				'constraint' => '254',
				'unique'     => true,
			],
			'activation_selector' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => true,
				'unique'     => true,
			],
			'activation_code' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => true,
			],
			'forgotten_password_selector' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => true,
				'unique'     => true,
			],
			'forgotten_password_code' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => true,
			],
			'forgotten_password_time' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => true,
				'null'       => true,
			],
			'remember_selector' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => true,
				'unique'     => true,
			],
			'remember_code' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => true,
			],
			'created_on' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => true,
			],
			'last_login' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => true,
				'null'       => true,
			],
			'active' => [
				'type'       => 'TINYINT',
				'constraint' => '1',
				'unsigned'   => true,
				'null'       => true,
			],
			'first_name' => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'       => true,
			],
			'last_name' => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'       => true,
			],
			'company' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'       => true,
			],
			'phone' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
				'null'       => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable($this->tables['users']);

		// Dumping data for table 'users'
		$data = [
			'ip_address'              => '127.0.0.1',
			'username'                => 'administrator',
			'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
			'email'                   => 'admin@admin.com',
			'activation_code'         => '',
			'forgotten_password_code' => null,
			'created_on'              => '1268889823',
			'last_login'              => '1268889823',
			'active'                  => '1',
			'first_name'              => 'Admin',
			'last_name'               => 'istrator',
			'company'                 => 'ADMIN',
			'phone'                   => '0',
		];
		$this->db->table($this->tables['users'])->insert($data);

		// Drop table 'users_groups' if it exists
		$this->forge->dropTable($this->tables['users_groups'], true);

		// Table structure for table 'users_groups'
		$this->forge->addField([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user_id' => [
				'type'       => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned'   => true,
			],
			'group_id' => [
				'type'       => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned'   => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable($this->tables['users_groups']);

		// Dumping data for table 'users_groups'
		$data = [
			[
				'user_id'  => '1',
				'group_id' => '1',
			],
			[
				'user_id'  => '1',
				'group_id' => '2',
			],
		];
		$this->db->table($this->tables['users_groups'])->insertBatch($data);

		// Drop table 'login_attempts' if it exists
		$this->forge->dropTable($this->tables['login_attempts'], true);

		// Table structure for table 'login_attempts'
		$this->forge->addField([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'ip_address' => [
				'type'       => 'VARCHAR',
				'constraint' => '45',
			],
			'login' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'       => true,
			],
			'time' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => true,
				'null'       => true,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable($this->tables['login_attempts']);
	}

	/**
	 * Down
	 *
	 * @return void
	 */
	public function down()
	{
		$this->forge->dropTable($this->tables['users'], true);
		$this->forge->dropTable($this->tables['groups'], true);
		$this->forge->dropTable($this->tables['users_groups'], true);
		$this->forge->dropTable($this->tables['login_attempts'], true);
	}
}
