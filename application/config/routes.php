<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['join'] = 'rooms/join';
$route['create/(:any)'] = 'rooms/create/$1';

$route['migrate'] = 'migrate/index';

$route['(:any)'] = 'pages/$1';
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
