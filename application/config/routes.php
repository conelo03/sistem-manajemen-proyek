<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] 				= 'Login/proses';
$route['logout'] 				= 'Login/logout';
$route['dashboard']				= 'Dashboard';

// user
$route['user'] = 'User';
$route['save-new-user'] = 'User/save_new_user';
$route['save-edit-user/(:any)'] = 'User/save_edit_user/$1';
$route['delete-user/(:any)'] = 'User/delete_user/$1';
$route['change-user-photos/(:any)'] = 'User/change_photos/$1';

// project
$route['project'] = 'Project';
$route['save-new-project'] = 'Project/save_new_project';
$route['save-edit-project/(:any)'] = 'Project/save_edit_project/$1';
$route['delete-project/(:any)'] = 'Project/delete_project/$1';
$route['detail-project/(:any)'] = 'Project/detail_project/$1';
$route['print-project/(:any)'] = 'Project/print_project/$1';

// activity
$route['save-new-activity/(:any)'] = 'Project/save_new_activity/$1';
$route['save-edit-activity/(:any)/(:any)'] = 'Project/save_edit_activity/$1/$2';
$route['update-status-activity/(:any)/(:any)'] = 'Project/update_status_activity/$1/$2';
$route['delete-activity/(:any)/(:any)'] = 'Project/delete_activity/$1/$2';

$route['save-new-attachment/(:any)'] = 'Project/save_new_attachment/$1';
$route['delete-attachment/(:any)/(:any)'] = 'Project/delete_attachment/$1/$2';
