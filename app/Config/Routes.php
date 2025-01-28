<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Grupo de rotas públicas (sem autenticação)
$routes->group('', function ($routes) {
  $routes->get('/', 'Home::index');
  $routes->get('login', 'User::login_page');
  $routes->get('register', 'User::register_page');

  // Rotas POST para processar formulários
  $routes->post('login', 'User::login');
  $routes->post('register', 'User::create');
});

// Grupo de rotas protegidas (requer autenticação)
$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {
  $routes->get('/', 'Dashboard::index');
  $routes->get('profile', 'User::profile');
  $routes->get('edit_profile', 'User::edit_profile');
  $routes->get('logout', 'User::logout');

  $routes->post('logout', 'User::logout');
  $routes->post('update_profile', 'User::update_profile');
});

$routes->group('admin', ['filter' => 'admin'], function ($routes) {
  $routes->get('/', 'Admin::index');
  $routes->get('users', 'Admin::users');
  
  $routes->get('users/edit_user/(:num)', 'Admin::edit_user_page/$1');
  $routes->get('users/profile', 'User::profile');
  $routes->get('users/edit_profile', 'User::edit_profile');
  $routes->get('users/create_user', 'Admin::create_user_page');

  $routes->post('users/save_user', 'Admin::create_user');
  $routes->post('users/toggle_user_status', 'Admin::toggle_user_status');
  $routes->post('users/update_user/(:num)', 'Admin::update_user/$1');

  $routes->get('logout', 'User::logout');
});
