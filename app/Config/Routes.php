<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



// $routes->get('/', 'User::index', ['filter' => 'role:user']);
$routes->get('/', 'User::index');


$routes->get('/user', 'User::index');
$routes->get('/user', 'User::database');


$routes->get('/user/index', 'User::index', ['filter' => 'role:user']);
$routes->get('/user/database', 'User::database', ['filter' => 'role:user']);


$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
