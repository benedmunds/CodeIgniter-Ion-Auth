<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{
	
	public $active = null;
	public $email = null;
	public $first_name = null;
	public $last_name = null;
	public $id = null;
	public $username = null;
	public $preferred_language = null;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function fill_with(array $rest_return) {
		
		if(!isset($rest_return['data']) || count($rest_return['data']) != 1) return FALSE;
		
		foreach ($rest_return['data'][0] as $key => $value){
		
			switch ($key) {
				case 'enabled':
					$value ? $this->active = 1 : $this->active = 0;
				break;
		
				case 'mail':
					$this->email = strtolower($value[0]);
				break;

				case 'uid':
					$this->id = $value[0];
				break;
				
				case 'fileAs':
					$this->username = strtolower($value[0]);
				break;

				case 'givenName':
					$this->first_name = $value[0];
				break;
				
				case 'sn':
					$this->last_name = $value[0];
				break;
				
				case 'preferredLanguage':
					$this->preferred_language = $value;
				break;
				
				default:
					$this->$key = $value;
				break;
			}
		}
		
		return TRUE;
	}	
	
	public function last_login($table) {
		
		$query = $this->db->select('last_login')
				->where('id', $this->id) 
				->get($table);
		
		return $query->row()->last_login;
	}
}
