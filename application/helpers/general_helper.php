<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Generate String
 * 
 * Generates a random string of capital letters
 * 
 * @param int $strength (Optional) The length of the string to generate. Default is 4 characters.
 */
function generate_string($strength = 4) {
    $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $permitted_chars[mt_rand(0, strlen($permitted_chars) - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}

/**
 * Auto Refresh
 * 
 * Injects JS to automatically refresh the page
 * 
 * @param int $interval (Optional) The interval in seconds between page refreshes. Default is 1 minute.
 */
function auto_refresh($interval = 1) {
    echo "<script>setTimeout(function() { location.reload() }, " . ($interval * 60000) . ")</script>";
}
