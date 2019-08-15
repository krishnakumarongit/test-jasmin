<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['sign-up'] = "login/signup";
$route['logout'] = "login/logout";
$route['forgot-password'] = "login/forgot";
$route['my-account'] = "myaccount/index";
$route['verify/(:any)'] = 'verify/index/$1';
$route['reset/(:any)'] = 'verify/reset/$1';
$route['everify'] = 'verify/everify';
$route['reset-success'] = 'verify/newpass';
$route['log-in'] = "login/index";
$route['default_controller'] = "welcome";
$route['auth/oauth2callback'] = 'Auth/oauth2callback';
$route['google'] = 'Auth/index';
$route['facebook'] = 'facebook/index';
$route['facebook/callback'] = 'facebook/callback';
$route['twitter'] = 'facebook/twitter';
$route['twitter/callback'] = 'facebook/twittercallback';

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
