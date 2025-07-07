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
$routes->post('/gsjob/update/(:segment)', 'Gsjob::update/$1');
$routes->get('/gsjob/create', 'Gsjob::create');
$routes->get('/gsjob/edit/(:segment)', 'Gsjob::edit/$1');
$routes->delete('/gsjob/(:num)', 'Gsjob::delete/$1');
$routes->get('/gsjob/(:any)', 'Gsjob::detail/$1');

$routes->get('/rigrfu', 'Rigrfu::index');
$routes->post('/rigrfu/save', 'Rigrfu::save');
$routes->post('/rigrfu/update/(:segment)', 'Rigrfu::update/$1');
$routes->get('/rigrfu/create', 'Rigrfu::create');
$routes->get('/rigrfu/edit/(:segment)', 'Rigrfu::edit/$1');
$routes->delete('/rigrfu/(:num)', 'Rigrfu::delete/$1');
$routes->get('/rigrfu/(:any)', 'Rigrfu::detail/$1');

$routes->get('/database', 'Database::index');
$routes->post('/database/save', 'Database::save');
$routes->post('/database/update/(:segment)', 'Database::update/$1');
$routes->delete('/database/(:num)', 'Database::delete/$1');
$routes->get('/database/create', 'Database::create');
$routes->get('/database/edit/(:segment)', 'Database::edit/$1');
$routes->get('/database/(:any)', 'Database::detail/$1');

$routes->get('/rusak', 'Rusak::index');
$routes->post('/rusak/save', 'Rusak::save');
$routes->post('/rusak/update/(:segment)', 'Rusak::update/$1');
$routes->get('/rusak/create', 'Rusak::create');
$routes->get('/rusak/edit/(:segment)', 'Rusak::edit/$1');
$routes->delete('/rusak/(:num)', 'Rusak::delete/$1');
$routes->get('/rusak/(:any)', 'Rusak::detail/$1');

$routes->get('/ht', 'Ht::index');
$routes->post('/ht/save', 'Ht::save');
$routes->post('/ht/update/(:segment)', 'Ht::update/$1');
$routes->get('/ht/create', 'Ht::create');
$routes->get('/ht/edit/(:segment)', 'Ht::edit/$1');
$routes->delete('/ht/(:num)', 'Ht::delete/$1');
$routes->get('/ht/(:any)', 'Ht::detail/$1');

// $routes->post('ready/save', 'ReadyController::save');



$routes->get('/user/index', 'User::index', ['filter' => 'role:user']);
// $routes->get('/database', 'Database::index', ['filter' => 'role:user']);
// $routes->get('/database', 'User::database', ['filter' => 'role:admin']);


$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
