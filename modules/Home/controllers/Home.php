<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	
	function __construct(){

		parent::__construct();

		# Load Library
		$this->load->library('template');

		# Load Helper
		$this->load->helper('url');

		# Load Model 
		$this->load->model('m_home');
	}

	public function index()
	{
		$data = array();

		# Set Layout			
		$this->template->set_layout('v_frontend');
		$this->template->title('Welcome to CodeIgniter');
		$this->template->set_partial('header', 'partials/v_header');
		$this->template->build('v_home', $data);	
	}
}


# www.bramsheehan.com
