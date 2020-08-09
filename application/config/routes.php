<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Game specific routes
    // Battleships
    $route['gamemaster/battleships'] = 'games/battleships/gamemaster_index';
    $route['players/battleships'] = 'games/battleships/player_index';

// General Routes
$route['join'] = 'rooms/join';
$route['create/(:any)'] = 'rooms/create/$1';

$route['migrate'] = 'migrate/index';

$route['(:any)'] = 'pages/$1';
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
