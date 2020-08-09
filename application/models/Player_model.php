<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Player_model extends CI_Model
{

    /**
     * Get by Display Name
     * 
     * Checks if there is a player with the same display name already in the room.
     * 
     * @param string $room_code The 4 digit room code
     * @param string $display_name The intended display name for the player
     * 
     * @return BOOLEAN
     */
    public function get_by_display_name($room_code, $display_name) {
        $this->db->join('rooms', 'rooms.id = room_players.room_id');
        $this->db->join('players', 'players.id = room_players.player_id');
        $this->db->where('rooms.room_code', $room_code);
        $this->db->where('players.name', $display_name);
        $result = $this->db->get('room_players')->row_array();

        if (empty($result)) {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * Create Player
     * 
     * Creates a Player
     * 
     * @param string $display_name The display name of the player
     * 
     * @return int ID of the player
     */
    public function create_player($display_name) {
        $data = array(
            'name' => $display_name,
        );

        $this->db->insert('players', $data);
        
        return $this->db->insert_id();
    }

    /**
     * Create Room Player
     * 
     * Creates a row in 'room_players'
     * 
     * @param int $player_id The player ID
     * @param int $room_id The room ID
     */
    public function create_room_player($room_id, $player_id) {
        $data = array(
            'room_id' => $room_id,
            'player_id' => $player_id,
        );

        $this->db->insert('room_players', $data);
        
        return;
    }

    /**
     * Get Single Player Data for Room
     * 
     * Returns an array of data for a single player for a given room.
     * 
     * @param int $player_id The player ID
     * @param int $room_id The room ID
     * 
     * @return array
     */
    public function get_single_player_data_for_room($player_id, $room_id) {
        $this->db->select('*, room_players.room_id AS room_id');
        $this->db->join('players', 'players.id = room_players.player_id');
        $this->db->where('room_players.player_id', $player_id);
        $this->db->where('room_players.room_id', $room_id);
        return $this->db->get('room_players')->row_array();
    }

}