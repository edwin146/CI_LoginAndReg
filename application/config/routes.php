<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "students";
$route['students/create'] = "students/create";
$route['students/welcome/(:any)'] = 'students/welcome/$1';
$route['404_override'] = '';

//end of routes.php