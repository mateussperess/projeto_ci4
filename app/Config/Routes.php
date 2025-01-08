<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Grupo de rotas públicas (sem autenticação)
$routes->group('', function($routes) {
  $routes->get('/', 'Home::index');
  $routes->get('login', 'User::login_page');
  $routes->get('register', 'User::register_page');
  
  // Rotas POST para processar formulários
  $routes->post('login', 'User::login');
  $routes->post('register', 'User::create');
});

// Grupo de rotas protegidas (requer autenticação)
$routes->group('', ['filter' => 'auth'], function($routes) {
  $routes->get('profile', 'User::profile');
  $routes->get('edit_profile', 'User::edit_profile');
  $routes->get('logout', 'User::logout');

  $routes->post('logout', 'User::logout');
  $routes->post('update_profile', 'User::update_profile');
  
  // Rotas para gerenciamento de imóveis
  // $routes->get('properties', 'Property::index');
  // $routes->get('properties/create', 'Property::create');
  // $routes->post('properties/store', 'Property::store');
  // $routes->get('properties/edit/(:num)', 'Property::edit/$1');
  // $routes->post('properties/update/(:num)', 'Property::update/$1');
});
