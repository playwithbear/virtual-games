<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Initialisation extends CI_Migration
{

    public function up() {

        $this->load->dbforge();

        // Creates new table 'library'
        $library_table = array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR(255)',
                'comment' => 'Name of the game'
            ),
            'name_slug' => array(
                'type' => 'VARCHAR(255)',
                'comment' => 'Lowercase slug name of the game'
            ),
            'description' => array(
                'type' => 'TEXT',
                'comment' => 'Description of the game'
            ),
            'thumbnail' => array(
                'type' => 'VARCHAR(255)',
                'null' => TRUE,
                'comment' => 'Filename of thumbnail'
            ),
        );
        $this->dbforge->add_field($library_table);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('library');

        // Have to do separately because CI is weird (To have default as CURRENT_TIMESTAMP)
        $this->db->query("ALTER TABLE `library` ADD `created_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `thumbnail`;");
        $this->db->query("ALTER TABLE `library` ADD `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_on`;");

        
        
        // Creates new table 'rooms'
        $rooms_table = array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'game_id' => array(
                'type' => 'INT',
                'comment' => 'The ID of the game',
            ),
            'room_code' => array(
                'type' => 'VARCHAR(4)',
                'comment' => 'Code of the room'
            ),
            'created_by' => array(
                'type' => 'VARCHAR(255)',
                'comment' => 'Creator of the room'
            ),
            'accepting_players' => array(
                'type' => 'INT',
                'default' => 1,
                'comment' => 'Default is 1, accepting players. Will set to 0 once game begins.',
            ),
            'closed' => array(
                'type' => 'INT',
                'default' => 0,
                'comment' => 'When created room is not closed, thus false (0). When closed, update to one.',
            ),
        );
        $this->dbforge->add_field($rooms_table);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('rooms');

        // Have to do separately because CI is weird (To have default as CURRENT_TIMESTAMP)
        $this->db->query("ALTER TABLE `rooms` ADD `created_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_by`;");



        // Creates new table 'players'
        $players_table = array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR(255)',
                'comment' => 'Name of the user'
            ),
        );
        $this->dbforge->add_field($players_table);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('players');



        // Creates new table 'room_players'
        $room_players_table = array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'room_id' => array(
                'type' => 'INT',
                'comment' => 'The ID of the room',
            ),
            'player_id' => array(
                'type' => 'INT',
                'comment' => 'The ID of the player',
            ),
            'score' => array(
                'type' => 'INT',
                'default' => 0,
                'comment' => 'The players score',
            ),
        );
        $this->dbforge->add_field($room_players_table);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('room_players');
        
        // Confirmation message
        echo 'Initialisation migration completed.';
    }

}