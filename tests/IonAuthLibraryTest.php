<?php
namespace Tests;

/**
 * IonAuth librarie tests
 *
 * @package CodeIgniter-Ion-Auth
 * @author  Benoit VRIGNAUD <benoit.vrignaud@zaclys.net>
 * @license https://opensource.org/licenses/MIT	MIT License
 */

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

/**
 * IonAuth\Libraries\IonAuth tests
 *
 * @package CodeIgniter-Ion-Auth
 */
class IonAuthLibraryTest extends CIUnitTestCase
{
	use DatabaseTestTrait {
		setUpDatabase as protected traitSetUpDatabase;
	}

	/**
	 * Namespace of the IonAuth migrations.
	 *
	 * @var string
	 */
	protected $namespace = 'IonAuth';

	/**
	 * Seed the database with the default IonAuth data.
	 *
	 * @var string
	 */
	protected $seed = 'IonAuth\\Database\\Seeds\\IonAuthSeeder';

	/**
	 * Load the helpers required by the tests.
	 *
	 * @return void
	 */
	protected function setUp(): void
	{
		helper('text');

		parent::setUp();
	}

	/**
	 * Point IonAuth at the SQLite "tests" connection group before running the
	 * migrations, so migrations, seeds and the library share one database.
	 *
	 * @return void
	 */
	protected function setUpDatabase()
	{
		config('IonAuth')->databaseGroupName = 'tests';

		$this->traitSetUpDatabase();
	}

	/**
	 * Test forgottenPassword()
	 *
	 * @return void
	 */
	public function testForgottenPassword()
	{
		$ionAuthLibrary = new \IonAuth\Libraries\IonAuth();

		$this->assertNotEmpty($ionAuthLibrary->forgottenPassword('admin@admin.com'));
	}

	/**
	 * Test register()
	 *
	 * @return void
	 */
	public function testRegister()
	{
		$ionAuthLibrary = new \IonAuth\Libraries\IonAuth();

		$this->assertGreaterThan(1, $ionAuthLibrary->register(random_string(), random_string(), random_string()));
	}

	/**
	 * Test loggedIn()
	 *
	 * @return void
	 */
	public function testLoggedIn(): void
	{
		$ionAuthLibrary = new \IonAuth\Libraries\IonAuth();
		$this->assertFalse($ionAuthLibrary->loggedIn());
	}

	/**
	 * Test isAdmin()
	 *
	 * @return void
	 */
	public function testIsAdmin()
	{
		$ionAuthLibrary = new \IonAuth\Libraries\IonAuth();

		// isAdmin() requires a logged in user.
		$this->assertTrue($ionAuthLibrary->login('admin@admin.com', 'password'));

		$this->assertTrue($ionAuthLibrary->isAdmin(1));

		$this->assertFalse($ionAuthLibrary->isAdmin(2));
	}
}
