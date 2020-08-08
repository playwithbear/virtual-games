<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Library_model extends CI_Model
{

    public function get_games() {
        return $this->db->get('library')->result_array();
    }

}