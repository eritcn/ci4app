<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */




$routes->get('/', 'User::index');


$routes->get('/user', 'User::index');
$routes->get('/database', 'Database::index');
$routes->get('/ready', 'Ready::index');
$routes->get('/breakdown', 'Breakdown::index');
$routes->get('/ht', 'Ht::index');



$routes->get('/user/index', 'User::index', ['filter' => 'role:user']);
$routes->get('/database', 'Database::index', ['filter' => 'role:user']);
$routes->get('/database', 'User::database', ['filter' => 'role:admin']);


$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
