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

/**
 * IonAuth\Libraries\IonAuth tests
 *
 * @package CodeIgniter-Ion-Auth
 */
class IonAuthLibraryTest extends CIUnitTestCase
{
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

		$this->assertTrue($ionAuthLibrary->isAdmin(1));

		$this->assertFalse($ionAuthLibrary->isAdmin(2));
	}
}
