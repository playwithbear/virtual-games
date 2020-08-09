<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model
{

    /**
     * NB. ALL ROOM QUERIES NEED TO RESTRICT TO ROOMS WITHIN PAST 2 HOURS. EFFECTIVELY GIVING EACH ROOM A 2 HOUR LIFESPAN.
     */

    /**
     * Check Unique Room Code
     * 
     * Checks if the room code passed exists in the 'rooms' table, within 2 hours. If code is OK, i.e. doesn't exist, returns true, else false.
     * 
     * @param sting $room_code The code of the room to be checked
     * @return BOOLEAN
     */
    public function check_unique_room_code($room_code) {
        $this->db->where('room_code', $room_code);
        $this->db->where('created_on >= DATE_SUB(NOW(), INTERVAL 2 HOUR)');
        $result = $this->db->get('rooms')->result_array();

        if (empty($result)) {
            return TRUE;
        }

        return FALSE;
    }
    
    /**
     * Create New Room
     * 
     * Creates a new entry in 'rooms' table
     * 
     * @param int $game_id The ID of the game being played in the room
     * @param string $room_code The code of the room
     * @param string $room_creator The user who created the room
     * 
     * @return int The ID of the row created
     */
    public function create_new_room($game_id, $room_code, $room_creator){
        $data = array(
            'game_id' => $game_id,
            'room_code' => $room_code,
            'created_by' => $room_creator,
        );

        $this->db->insert('rooms', $data);
        
        return $this->db->insert_id();
    }

}