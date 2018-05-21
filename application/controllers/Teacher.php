<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
//include_once "models/inc.php";

class Teacher extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->_now = $this->input->server('REQUEST_TIME');
		$this->now = date('Y-m-d H:i:s', $this->_now);
	}
	
	public function index()
	{
		$data['baseUrl'] = base_url();
        
        $this->load->view('layout/header', $data);
		$this->load->view('teacherView', $data);
		$this->load->view('layout/script');
	}

}
