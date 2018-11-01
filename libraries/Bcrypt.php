<?php
/**
 * Name:    Bcrypt
 *
 * Requirements: PHP5 or above
 *
 * @package    CodeIgniter-Ion-Auth
 * @author     Ben Edmunds
 * @link       http://github.com/benedmunds/CodeIgniter-Ion-Auth
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Bcrypt
 */
class Bcrypt
{
	/**
	 * @var int
	 */
	private $rounds;

	/**
	 * @var string
	 */
	private $salt_prefix;

	/**
	 * @var int|string|null
	 */
	private $randomState;

	/**
	 * Bcrypt constructor.
	 *
	 * @param array $params
	 *
	 * @throws Exception
	 */
	public function __construct($params = array('rounds' => 7, 'salt_prefix' => '$2y$'))
	{

		if (CRYPT_BLOWFISH != 1)
		{
			throw new Exception("bcrypt not supported in this installation. See http://php.net/crypt");
		}

		$this->rounds = $params['rounds'];
		$this->salt_prefix = $params['salt_prefix'];
	}

	/**
	 * @param string $input
	 *
	 * @return bool|string
	 */
	public function hash($input)
	{
		$hash = crypt($input, $this->getSalt());

		if (strlen($hash) > 13)
		{
			return $hash;
		}

		return FALSE;
	}

	/**
	 * @param string $input
	 * @param string $existingHash
	 *
	 * @return bool
	 */
	public function verify($input, $existingHash)
	{
		$hash = crypt($input, $existingHash);
		return $this->hashEquals($existingHash, $hash);
	}

	/**
	 * Polyfill for hash_equals()
	 * Code mainly taken from hash_equals() compat function of CodeIgniter 3
	 *
	 * @param  string $known_string
	 * @param  string $user_string
	 *
	 * @return  bool
	 */
	private function hashEquals($known_string, $user_string)
	{
		// For CI3 or PHP >= 5.6
		if (function_exists('hash_equals'))
		{
			return hash_equals($known_string, $user_string);
		}

		// For CI2 with PHP < 5.6
		// Code from CI3 https://github.com/bcit-ci/CodeIgniter/blob/develop/system/core/compat/hash.php
		if (!is_string($known_string))
		{
			trigger_error('hash_equals(): Expected known_string to be a string, ' . strtolower(gettype($known_string)) . ' given', E_USER_WARNING);
			return FALSE;
		}
		else if (!is_string($user_string))
		{
			trigger_error('hash_equals(): Expected user_string to be a string, ' . strtolower(gettype($user_string)) . ' given', E_USER_WARNING);
			return FALSE;
		}
		else if (($length = strlen($known_string)) !== strlen($user_string))
		{
			return FALSE;
		}

		$diff = 0;
		for ($i = 0; $i < $length; $i++)
		{
			$diff |= ord($known_string[$i]) ^ ord($user_string[$i]);
		}

		return ($diff === 0);
	}

	/**
	 * @return string
	 */
	private function getSalt()
	{
		$salt = sprintf($this->salt_prefix . '%02d$', $this->rounds);

		$bytes = $this->getRandomBytes(16);

		$salt .= $this->encodeBytes($bytes);

		return $salt;
	}

	/**
	 * @param $count
	 *
	 * @return string
	 */
	private function getRandomBytes($count)
	{
		$bytes = '';

		if (function_exists('openssl_random_pseudo_bytes') &&
			(strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN'))
		{
			// OpenSSL slow on Win
			$bytes = openssl_random_pseudo_bytes($count);
		}

		if ($bytes === '' && @is_readable('/dev/urandom') &&
			($hRand = @fopen('/dev/urandom', 'rb')) !== FALSE)
		{
			$bytes = fread($hRand, $count);
			fclose($hRand);
		}

		if (strlen($bytes) < $count)
		{
			$bytes = '';

			if ($this->randomState === NULL)
			{
				$this->randomState = microtime();
				if (function_exists('getmypid'))
				{
					$this->randomState .= getmypid();
				}
			}

			for ($i = 0; $i < $count; $i += 16)
			{
				$this->randomState = md5(microtime() . $this->randomState);

				if (PHP_VERSION >= '5')
				{
					$bytes .= md5($this->randomState, TRUE);
				}
				else
				{
					$bytes .= pack('H*', md5($this->randomState));
				}
			}

			$bytes = substr($bytes, 0, $count);
		}

		return $bytes;
	}

	/**
	 * @param string $input
	 *
	 * @return string
	 */
	private function encodeBytes($input)
	{
		// The following is code from the PHP Password Hashing Framework
		$itoa64 = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

		$output = '';
		$i = 0;
		do
		{
			$c1 = ord($input[$i++]);
			$output .= $itoa64[$c1 >> 2];
			$c1 = ($c1 & 0x03) << 4;
			if ($i >= 16)
			{
				$output .= $itoa64[$c1];
				break;
			}

			$c2 = ord($input[$i++]);
			$c1 |= $c2 >> 4;
			$output .= $itoa64[$c1];
			$c1 = ($c2 & 0x0f) << 2;

			$c2 = ord($input[$i++]);
			$c1 |= $c2 >> 6;
			$output .= $itoa64[$c1];
			$output .= $itoa64[$c2 & 0x3f];
		} while (1);

		return $output;
	}
}
