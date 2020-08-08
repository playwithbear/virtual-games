<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index() {

		$data['title'] = 'Welcome to Virtual Games - Home';

		$this->load->view('inc/header', $data);
		$this->load->view('pages/index', $data);
		$this->load->view('inc/footer');

	}

	public function test() {

		$data['title'] = 'Test Page';

		$this->load->view('inc/header', $data);
		$this->load->view('pages/test', $data);
		$this->load->view('inc/footer');

	}


	// ===================================== PRIVATE FUNCTIONS =====================================
	
	
	
}
