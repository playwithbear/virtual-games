<?php

class Migrate extends CI_Controller
{

    public function index() {

        // // Auth and Validation - stops external triggering of migration script
        // if (!$this->auth_library->check_permitted_view()) {
        //     redirect('login');
        // }
        
        $this->load->library('migration');

        if ($this->migration->current() === false) {
            show_error($this->migration->error_string());
        }
    }

}