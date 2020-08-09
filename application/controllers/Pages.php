<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index() {

		$data['title'] = 'Welcome to Virtual Games';
		$data['library'] = $this->library_model->get_games();
		$data['gallery_data'] = array(
			'library_length' => count($data['library']),
			'row_count' => ceil(count($data['library'])/3),
		);

		$this->load->view('inc/header', $data);
		$this->load->view('pages/index', $data);
		$this->load->view('inc/footer');

	}

	public function about() {

		$data['title'] = 'About Virtual Games';

		$this->load->view('inc/header', $data);
		$this->load->view('pages/about', $data);
		$this->load->view('inc/footer');

	}

	/**
	 * For development purposes only!!!
	 */
	// public function unset_all_session_data() {
	// 	$this->session->sess_destroy();
	// }


	// ===================================== PRIVATE FUNCTIONS =====================================
	
	
	
}
