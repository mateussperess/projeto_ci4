<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'Home::index');
$routes->get('users', 'UserController::index');

// $routes->get('usuarios', 'User::index');

$routes->get('createaccount', 'UserController::createAccount');