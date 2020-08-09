<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Library_model extends CI_Model
{

    public function get_games($id = NULL) {
        
        if ($id) {
            $this->db->where('id', $id);
            return $this->db->get('library')->row_array();    
        }

        return $this->db->get('library')->result_array();
    }

}