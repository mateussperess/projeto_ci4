<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'User::login_page');
$routes->post('login', 'User::login');
$routes->get('register', 'User::register_page');
$routes->post('register', 'User::create');
// $routes->post('login', 'Auth::loginAction');

$routes->get('profile', 'User::profile');
$routes->get('profile', 'User::profile');
$routes->get('edit_profile', 'User::edit_profile');
$routes->post('update_profile', 'User::update_profile');

$routes->get('logout', 'User::logout');
$routes->post('logout', 'User::logout');
