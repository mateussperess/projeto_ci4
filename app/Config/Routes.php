<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'Home::index');
$routes->get('users', 'UserController::list_users');

$routes->get('login', 'UserController::form_login');

$routes->get('register', 'UserController::form_create');
$routes->post('create', 'UserController::create');