<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {

	public function create($id) {

		$data['title'] = 'CREATE A ROOM! - ' . $id;
		$data['library'] = $this->library_model->get_games();

		$this->load->view('inc/header', $data);
		$this->load->view('rooms/create', $data);
		$this->load->view('inc/footer');

	}

	public function join() {

		$data['title'] = 'Join a Game';

		$this->load->view('inc/header', $data);
		$this->load->view('rooms/join', $data);
		$this->load->view('inc/footer');

	}


	// ===================================== PRIVATE FUNCTIONS =====================================
	
	
	
}
