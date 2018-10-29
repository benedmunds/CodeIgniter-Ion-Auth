<?php
namespace IonAuth\Tests;

/**
 * IonAuthModel tests
 *
 * @package CodeIgniter-Ion-Auth
 * @author  Benoit VRIGNAUD <benoit.vrignaud@zaclys.net>
 * @license https://opensource.org/licenses/MIT	MIT License
 */

use IonAuth\Models\IonAuthModel;

/**
 * IonAuthModel tests
 *
 * @package CodeIgniter-Ion-Auth
 */
class IonAuthModelTest extends \CodeIgniter\Test\CIDatabaseTestCase
{
	/**
	 * Should the db be refreshed before
	 * each test?
	 *
	 * @var boolean
	 */
	protected $refresh = false;

	/**
	 * @var IonAuthModel
	 */
	private $model;


	public function setUp()
	{
		parent::setUp();
		$this->model = new IonAuthModel();
	}

	/**
	 * Test :
	 *  - deactivate
	 *  - activate
	 *
	 * @return void
	 */
	public function testActivateDeactivate()
	{
		$this->assertTrue($this->model->deactivate(1));
		$this->assertTrue($this->model->activate(1));
	}

	/**
	 * Test emailCheck
	 *
	 * @return void
	 */
	public function testEmailCheck()
	{
		$this->assertTrue($this->model->emailCheck('admin@admin.com'));
		$this->assertFalse($this->model->emailCheck(''));
		$this->assertFalse($this->model->emailCheck('email@undefined.unknown'));
	}

	/**
	 * Test getUserByForgottenPasswordCode
	 *
	 * @return void
	 */
	public function testGetUserByForgottenPasswordCode()
	{
		$this->assertFalse($this->model->getUserByForgottenPasswordCode(random_string() . '.' . random_string()));
	}

	/**
	 * Test register
	 *
	 * @return void
	 */
	public function testRegister()
	{
		$identity = random_string();
		$password = random_string();
		$email    = random_string();
		$this->assertGreaterThan(1, $this->model->register($identity, $password, $email));
	}

	/**
	 * Test login
	 *
	 * @return void
	 */
	public function testLogin()
	{
		$this->assertFalse($this->model->login('admin@admin.com', 'bad_password'));
	}

	/**
	 * Test getLastAttemptTime()
	 *
	 * @return void
	 */
	public function testGetLastAttemptTime()
	{
		config('IonAuth')->trackLoginAttempts = true;

		$this->model->login('admin@admin.com', random_string());

		$this->assertGreaterThan(0, $this->model->getLastAttemptTime('admin@admin.com'));

		config('IonAuth')->trackLoginAttempts = false;
		$this->assertEquals(0, $this->model->getLastAttemptTime('admin@admin.com'));
	}

	/**
	 * Test clearLoginAttempts()
	 *
	 * @return void
	 */
	public function testClearLoginAttempts()
	{
		config('IonAuth')->trackLoginAttempts = true;
		$this->assertTrue($this->model->clearLoginAttempts('admin@admin.com'));
	}

	/**
	 * Test users()
	 *
	 * @return void
	 */
	public function testUsers()
	{
		$this->assertNotEmpty($this->model->users());
		$this->assertNotEmpty($this->model->users('admin'));
		$this->assertNotEmpty($this->model->users(random_string()));
		$this->assertNotEmpty($this->model->users(1000));
	}

	/**
	 * Test removeFromGroup, addToGroup()
	 *
	 * @return void
	 */
	public function testRemoveFromAndAddToGroup()
	{
		$this->assertTrue($this->model->removeFromGroup(1, 1));
		$this->assertEquals(1, $this->model->addToGroup(1, 1));
	}

	/**
	 * Test createGroup(), updateGroup(), DeleteGroup()
	 *
	 * @return void
	 */
	public function testCreateUpdateDeleteGroup()
	{
		$idGroup = $this->model->createGroup(random_string());
		$this->assertTrue($this->model->updateGroup($idGroup, random_string(), ['description' => 'test']));
		$this->assertTrue($this->model->deleteGroup($idGroup));
	}

	/**
	 * Test setMessage()
	 *
	 * @return void
	 */
	public function testSetMessage()
	{
		$message = 'Test string';
		$this->assertEquals($message, $this->model->setMessage($message));
	}

	/**
	 * Test testMessages()
	 *
	 * @return void
	 */
	public function testMessages()
	{
		$this->assertEmpty($this->model->messages());
	}

	/**
	 * Test testMessagesArray()
	 *
	 * @return void
	 */
	public function testMessagesArray()
	{
		$this->assertEmpty($this->model->messagesArray());
	}

	/**
	 * Test setError()
	 *
	 * @return void
	 */
	public function testSetError()
	{
		$error = 'Test string';
		$this->assertEquals($error, $this->model->setError($error));
	}

	/**
	 * Test testErrors()
	 *
	 * @return void
	 */
	public function testErrors()
	{
		$this->model->setError('Test error !');
		$this->assertContains('Test error !', $this->model->errors());
	}

	/**
	 * Test errorsArray()
	 *
	 * @return void
	 */
	public function testErrorsArray()
	{
		$this->assertEmpty($this->model->errorsArray());

		$this->model->setError('Test string');

		$this->assertEquals('Test string', $this->model->errorsArray(false)[0]);

		$this->assertEquals('##Test string##', $this->model->errorsArray()[0]);
	}

	/**
	 * Test getErrors()
	 *
	 * @return void
	 */
	public function testGetErrors()
	{
		$this->assertEmpty($this->model->getErrors());

		$this->model->setError('Test string');

		$this->assertEquals('Test string', $this->model->getErrors()[0]);
	}

}
