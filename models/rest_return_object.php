<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest_Return_Object extends CI_Model
{	
	protected $data = array(); //contains data
	protected $http_status_code = null; //this is for REST response.
	protected $http_message = null; //this is for REST response.
	protected $results_number = null; //total number of result for the current request
	protected $results_got_number = null; //number of items contained in the current set
	protected $results_pages = null; //number of pages necessary to display all the data
	protected $results_page = null; //page number of the current set	
	protected $finished = null; //the time in which CE delivered the result
	protected $duration = null; //the time spent by CE to process the request
	public $has_no_errors = true;
	public $has_errors = false;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function __destruct(){
	
	}
	
	public function __set($attribute, $value) {
		$this->$attribute = $value;
	}
	
	public function __get($attribute) {
		return $this->$attribute;
	}
	
	private function validateCeRestReturn($crr) 
	{
		$this->has_no_errors = false;
		if(!is_array($crr)) return false;
		if(!isset($crr['status']) || !is_array($crr['status'])) return false;
		if(!isset($crr['status']['results_number'])) return false;
		if(!isset($crr['status']['results_got_number'])) return false;
		if(!isset($crr['status']['results_pages'])) return false;
		if(!isset($crr['status']['results_page'])) return false;
		if(!isset($crr['status']['finished'])) return false;
		if(!isset($crr['status']['duration'])) return false;
		if(!isset($crr['data']) || !is_array($crr['data'])) return false;
		$this->has_no_errors = true;
		return true;
	}
	
	private function checkRestError()
	{
		if($this->http_status_code != '200')
		{
			$CI = get_instance();
			$CI->session->set_flashdata('custom_error', $this->http_message);
			$this->has_no_errors = false;
		}	
	}

	private function reset()
	{
		$this->data = array();
		$this->http_status_code = null;
		$this->http_message = null;
		$this->results_number = null;
		$this->results_got_number = null;
		$this->results_pages = null;
		$this->results_page = null;
		$this->finished = null;
		$this->duration = null;
		$this->has_no_errors = true;		
	}
	
	public function importCeReturnObject($crr)
	{
		//destroies and rebuilt this object cleaning all the previous content
		$this->reset();
		
		if(!$this->validateCeRestReturn($crr)) return false;
		
		$this->data = $crr['data'];
		$this->http_status_code = $crr['status']['status_code'];
		$this->http_message = $crr['status']['message'];
		$this->results_number = $crr['status']['results_number'];
		$this->results_got_number = $crr['status']['results_got_number'];
		$this->results_pages = $crr['status']['results_pages'];
		$this->results_page = $crr['status']['results_page'];
		$this->finished = $crr['status']['finished'];
		$this->duration = $crr['status']['duration'];

		$this->checkRestError();
		return true;
	}
	
 	public function returnAsArray() {
		$output = array(
				'status' => array(
						'results_number' => 0,
						'results_got_number' => 0,
						'results_pages' => 1,
						'results_page' => 1,
						'finished' => null,
						'duration' => null,
						'status_code' => null,
						'message' => null,
				),
				'data' => array(),
		);		
		
		//REST info
		if(isset($this->http_status_code)) $output['status']['status_code'] = $this->http_status_code;
		if(isset($this->http_message)) $output['status']['message'] = $this->http_message;
		
		//pagination
		if(isset($this->results_number)) $output['status']['results_number'] = $this->results_number;
		if(isset($this->results_pages)) $output['status']['results_pages'] = $this->results_pages;
		if(isset($this->results_page)) $output['status']['results_page'] = $this->results_page;
		if(isset($this->results_got_number)) $output['status']['results_got_number'] = $this->results_got_number;
		
		//content
		if(!empty($this->data)) $output['data'] = $this->data;
		
		return $output;
	} 
	
}