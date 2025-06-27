<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */




$routes->get('/', 'User::index');


$routes->get('/user', 'User::index');
$routes->get('/ready', 'Ready::index');
$routes->get('/breakdown', 'Breakdown::index');
$routes->get('/ht', 'Ht::index');
$routes->get('/gsjob', 'Gsjob::index');
$routes->post('/gsjob/save', 'Gsjob::save');
$routes->get('/gsjob/create', 'Gsjob::create');
$routes->get('/gsjob/(:segment)', 'Gsjob::detail/$1');
$routes->get('/rigrfu', 'Rigrfu::index');
$routes->post('/rigrfu/save', 'Rigrfu::save');
$routes->get('/rigrfu/create', 'Rigrfu::create');
$routes->get('/rigrfu/(:segment)', 'Rigrfu::detail/$1');
$routes->get('/database', 'Database::index');
$routes->post('/database/save', 'Database::save');
$routes->get('/database/create', 'Database::create');
$routes->get('/database/(:segment)', 'Database::detail/$1');
$routes->get('/rusak', 'Rusak::index');
$routes->post('/rusak/save', 'Rusak::save');
$routes->get('/rusak/create', 'Rusak::create');
$routes->get('/rusak/(:segment)', 'Rusak::detail/$1');
$routes->get('/ht', 'Ht::index');
$routes->post('/ht/save', 'Ht::save');
$routes->get('/ht/create', 'Ht::create');
$routes->get('/ht/(:segment)', 'Ht::detail/$1');

// $routes->post('ready/save', 'ReadyController::save');



$routes->get('/user/index', 'User::index', ['filter' => 'role:user']);
// $routes->get('/database', 'Database::index', ['filter' => 'role:user']);
// $routes->get('/database', 'User::database', ['filter' => 'role:admin']);


$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
