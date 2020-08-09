<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Battleships extends CI_Controller {

	public function gamemaster_index() {

		$data['title'] = 'Battleships Gamemaster Dashboard!';
		$data['userdata'] = $this->session->userdata();

		$this->load->view('inc/header', $data);
		$this->load->view('games/battleships/gamemaster/index', $data);
		$this->load->view('inc/footer');

	}

	public function player_index() {

		$data['title'] = 'Battleships Player Dashboard!';
		$data['userdata'] = $this->session->userdata();

		$this->load->view('inc/header', $data);
		$this->load->view('games/battleships/players/index', $data);
		$this->load->view('inc/footer');

	}

	// ===================================== PRIVATE FUNCTIONS =====================================
	
	
	
}
