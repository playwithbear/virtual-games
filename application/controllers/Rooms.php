<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {

	public function create($game_id) {

		$game_info = $this->library_model->get_games($game_id);

		// Generate a unique room code
		$room_code = generate_string();
		while (!$this->room_model->check_unique_room_code($room_code)) {
			$room_code = generate_string();
		}

		// Generate guest user id <-- WILL LATER HANDLE IF USER IS LOGGED IN/REGISTERED
		$room_creator = 'guest_' . generate_number_string();

		// Create a room in 'rooms' table
		$new_room_id = $this->room_model->create_new_room($game_id, $room_code, $room_creator);

		// Gather data needed for game dashboard, and set session
		$gamemaster_data = array(
			'game_info' => $game_info,
			'room_code' => $room_code,
			'room_creator' => $room_creator,
			'room_id' => $new_room_id,
		);
		$this->session->set_userdata($gamemaster_data);

		// Redirect to relevant game room (to avoid page refreshes creating loads of rooms)
		redirect('gamemaster/' . $game_info['name_slug']);

	}

	/**
	 * Join
	 * 
	 * Renders a simple page with two text boxes, for room ID and a display name. 
	 * Handles form submission also.
	 */
	public function join() {

		// If form submitted
			// If room exists and is open then display user room page
			// Else set error message

		// Else display join room form

		$data['title'] = 'Join a Game';

		$this->load->view('inc/header', $data);
		$this->load->view('rooms/join', $data);
		$this->load->view('inc/footer');

	}


	// ===================================== PRIVATE FUNCTIONS =====================================
	
	
	
}
