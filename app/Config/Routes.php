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

  $routes->get('houses', 'PreAnnouncement::houses');
  $routes->get('houses/(:num)', 'PreAnnouncement::view_announcement/$1');
  
  $routes->post('login', 'User::login');
  $routes->post('register', 'User::create');
});

// Grupo de rotas protegidas (requer autenticação)
$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {
  $routes->get('/', 'Dashboard::index');
  $routes->get('profile', 'User::profile');
  $routes->get('edit_profile', 'User::edit_profile');
  $routes->get('logout', 'User::logout');
  
  $routes->get('houses', 'PreAnnouncement::houses');
  $routes->get('houses/(:num)', 'PreAnnouncement::view_announcement/$1');
  
  $routes->get('announce', 'PreAnnouncement::create');
  $routes->post('submit_announce', 'PreAnnouncement::store');
  $routes->get('announcements/(:num)', 'PreAnnouncement::list/$1');
  $routes->get('announcement/(:num)', 'User::view_announce/$1');
  
  $routes->post('logout', 'User::logout');
  $routes->post('update_profile', 'User::update_profile');
});

$routes->group('broker', '', function ($routes) {
  $routes->get('/', 'Broker::index');
  $routes->get('pending', 'Broker::pending');
  $routes->get('review/(:num)', 'Broker::review/$1');
  $routes->get('evaluated', 'Broker::evaluated');

  $routes->post('reject/(:num)', 'Broker::reject/$1');
  $routes->post('approve/(:num)', 'Broker::approve/$1');

  $routes->get('profile', 'Broker::profile');
  $routes->post('update_profile', 'Broker::update_profile');
  $routes->get('logout', 'Broker::logout');
});

$routes->group('admin', ['filter' => 'admin'], function ($routes) {
  $routes->get('/', 'Admin::index');
  $routes->get('users', 'Admin::users');
  $routes->get('profile', 'User::profile');
  
  $routes->get('users/edit_user/(:num)', 'Admin::edit_user_page/$1');
  $routes->get('users/edit_profile', 'User::edit_profile');
  $routes->get('users/create_user', 'Admin::create_user_page');

  $routes->post('users/save_user', 'Admin::create_user');
  $routes->post('users/toggle_user_status', 'Admin::toggle_user_status');
  $routes->post('users/update_user/(:num)', 'Admin::update_user/$1');

  $routes->get('logout', 'User::logout');
});
