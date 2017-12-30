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

$route['default_controller'] 	= "landing";
$route['404_override'] = '';

/* komentar */
$route['komentar'] = "komentar/index/0/1";
$route['komentar/hal/(:any)'] = "komentar/hal/0/1/$1";
$route['komentar/edit/(:any)'] = "komentar/edit/$1";
$route['komentar/update'] = "komentar/update";
$route['komentar/insert'] = "komentar/insert";
$route['komentar/create'] = "komentar/create";
$route['komentar/delete/(:any)'] = "komentar/delete/$1";

/* pesan */
$route['pesan'] = "komentar/index/0/2";
$route['pesan/hal/(:any)'] = "komentar/hal/0/2/$1";
$route['pesan/edit/(:any)'] = "komentar/edit/$1";
$route['pesan/update'] = "komentar/update";
$route['pesan/insert'] = "komentar/insert";
$route['pesan/create'] = "komentar/create";
$route['pesan/delete/(:any)'] = "komentar/delete/$1";

/* weblink */
$route['weblink'] = "weblink/index/0/3";
$route['weblink/hal/(:any)'] = "weblink/hal/0/3/$1";
$route['weblink/edit/(:any)'] 	= "weblink/edit/$1";
$route['weblink/update'] = "weblink/update";
$route['weblink/insert'] = "weblink/insert";
$route['weblink/create'] = "weblink/create";
$route['weblink/delete/(:any)'] = "weblink/delete/$1";

/* sosmed */
$route['sosmed'] = "weblink/index/0/4";
$route['sosmed/hal/(:any)'] = "weblink/hal/0/4/$1";
$route['sosmed/edit/(:any)'] 	= "weblink/edit/$1";
$route['sosmed/update'] = "weblink/update";
$route['sosmed/insert'] = "weblink/insert";
$route['sosmed/create'] = "weblink/create";
$route['sosmed/delete/(:any)'] = "weblink/delete/$1";

/* banner */
$route['banner'] = "banner/index";
$route['banner/hal/(:any)'] = "banner/hal/$1";
$route['banner/edit/(:any)']    = "banner/edit/$1";
$route['banner/update'] = "banner/update";
$route['banner/insert'] = "banner/insert";
$route['banner/create'] = "banner/create";
$route['banner/delete/(:any)'] = "banner/delete/$1";

/* News */
$route['channel/edit/(:any)']    = "channel/edit/$1";
$route['read/(:any)/(:any)/(:any)'] = "landing/view_news/$1/$2/$3";
$route['channel/(:any)/(:any)'] = "landing/view_channel/$1/$2";
$route['most-recent'] = "landing/view_recent";
$route['tagging'] = "landing/view_tagging";
$route['page/(:any)'] = "landing/view_page/$1";
$route['sitemap\.xml'] = "landing/sitemap";


/* End of file routes.php */
/* Location: ./application/config/routes.php */
