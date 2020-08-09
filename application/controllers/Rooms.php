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
			'gamemaster_data' => array(
				'game_info' => $game_info,
				'room_code' => $room_code,
				'room_creator' => $room_creator,
				'room_id' => $new_room_id,
			),
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
		if ($this->input->post('room-code')) {

			$room_code = strtoupper($this->input->post('room-code'));
			$display_name = $this->input->post('display-name');
			
			// If room exists and is open then display user room page
			if (!empty($this->room_model->check_to_join_room($room_code))) {
				
				// Then check if display name is already in use
				if ($this->player_model->get_by_display_name($room_code, $display_name)) {
					$this->join_room($room_code, $display_name);
				} else {
					$data['error'] = 'Display name is already in use. Please choose another.';
				}

			} else {
				// Else set error message
				$data['error'] = 'Room cannot be found, or is closed to new participants.';
			}
		}

		// Else display join room form
		$data['title'] = 'Join a Game';
		$data['post'] = $this->input->post();

		$this->load->view('inc/header', $data);
		$this->load->view('rooms/join', $data);
		$this->load->view('inc/footer');

	}


	// ===================================== PRIVATE FUNCTIONS =====================================
	
	private function join_room($room_code, $display_name) {

		// Get room data
		$room_data = $this->room_model->get_room_only_data_by_code($room_code);

		// Create player, and get player_id
		$player_id = $this->player_model->create_player($display_name);

		// Add player to the room
		$this->player_model->create_room_player($room_data['room_id'], $player_id);

		// Set session variable with player details
		$player_data = array(
			'player_data' => array(
				'room_data' => $room_data,
				'player_data' => $this->player_model->get_single_player_data_for_room($player_id, $room_data['room_id']),
			),
		);
		$this->session->set_userdata($player_data);

		// Redirect to avoid creating multiple participants
		redirect('players/' . $room_data['name_slug']);

	}
	
}
