<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = "index";
$route['404_override'] = '';
$route['user/(:num)'] = 'user/index/$1';
$route['item/(:num)'] = 'item/index/$1';
$route['item/del/(:num)'] = 'item/del/$1';
// $route['item/edit/(:num)'] = 'item/edit/$1';
$route['topic/(:num)'] = 'topic/index/$1';
$route['letter/(:num)'] = 'letter/index/$1';
$route['comment/add/(:num)'] = 'comment/add/$1';
$route['upload/(:any)'] = 'media/resize/$1';

// $route['news/create'] = 'news/create';
// $route['news'] = 'news/index';
// $route['(:any)'] = 'pages/view/$1';




/* End of file routes.php */
/* Location: ./application/config/routes.php */