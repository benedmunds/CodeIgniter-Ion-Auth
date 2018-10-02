<?php
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
	 * Test emailCheck
	 *
	 * @return void
	 */
	public function testEmailCheck()
	{
		$model = new IonAuthModel();
		$this->assertTrue($model->emailCheck('admin@admin.com'));
		$this->assertFalse($model->emailCheck(''));
		$this->assertFalse($model->emailCheck('email@undefined.unknown'));
	}

	/**
	 * Test clearLoginAttempts()
	 *
	 * @return void
	 */
	public function testClearLoginAttempts()
	{
		$model = new IonAuthModel();
		$this->assertTrue($model->clearLoginAttempts('admin@admin.com'));
	}

}
