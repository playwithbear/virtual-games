<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Battleships extends CI_Controller {

	public function index() {

		$data['title'] = 'Battleships Dashboard!';
		$data['userdata'] = $this->session->userdata();

		$this->load->view('inc/header', $data);
		$this->load->view('games/battleships/index', $data);
		$this->load->view('inc/footer');

	}

	// ===================================== PRIVATE FUNCTIONS =====================================
	
	
	
}
