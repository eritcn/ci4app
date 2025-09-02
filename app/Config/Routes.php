<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// Route test kirim email, tanpa filter login
// $routes->get('/testmail', 'TestMail::index');


// Default
$routes->get('/', 'User::index');


// User routes (public/general)
$routes->get('/user', 'User::index');
$routes->get('/ready', 'Ready::index');
$routes->get('/breakdown', 'Breakdown::index');

// CRUD Gsjob
$routes->get('/gsjob', 'Gsjob::index');
$routes->post('/gsjob/save', 'Gsjob::save');
$routes->post('/gsjob/update/(:segment)', 'Gsjob::update/$1');
$routes->get('/gsjob/create', 'Gsjob::create');
$routes->get('/gsjob/edit/(:segment)', 'Gsjob::edit/$1');
$routes->delete('/gsjob/(:num)', 'Gsjob::delete/$1');
$routes->get('/gsjob/(:any)', 'Gsjob::detail/$1');

// CRUD Rigrfu
$routes->get('/rigrfu', 'Rigrfu::index');
$routes->post('/rigrfu/save', 'Rigrfu::save');
$routes->post('/rigrfu/update/(:segment)', 'Rigrfu::update/$1');
$routes->get('/rigrfu/create', 'Rigrfu::create');
$routes->get('/rigrfu/edit/(:segment)', 'Rigrfu::edit/$1');
$routes->delete('/rigrfu/(:num)', 'Rigrfu::delete/$1');
$routes->get('/rigrfu/(:any)', 'Rigrfu::detail/$1');

// CRUD Database
$routes->get('/database', 'Database::index');
$routes->post('/database/save', 'Database::save');
$routes->post('/database/update/(:segment)', 'Database::update/$1');
$routes->delete('/database/(:num)', 'Database::delete/$1');
$routes->get('/database/create', 'Database::create');
$routes->get('/database/edit/(:segment)', 'Database::edit/$1');
$routes->get('/database/(:any)', 'Database::detail/$1');

// Routes untuk Sparepart
$routes->get('/sparepart', 'Sparepart::index');
$routes->post('/sparepart/save', 'Sparepart::save');
$routes->post('/sparepart/update/(:num)', 'Sparepart::update/$1');
$routes->delete('/sparepart/(:num)', 'Sparepart::delete/$1');
$routes->get('/sparepart/create', 'Sparepart::create');
$routes->get('/sparepart/edit/(:num)', 'Sparepart::edit/$1');
$routes->get('/sparepart/(:num)', 'Sparepart::detail/$1');





// CRUD Rusak
$routes->get('/rusak', 'Rusak::index');
$routes->post('/rusak/save', 'Rusak::save');
$routes->post('/rusak/update/(:segment)', 'Rusak::update/$1');
$routes->get('/rusak/create', 'Rusak::create');
$routes->get('/rusak/edit/(:segment)', 'Rusak::edit/$1');
$routes->delete('/rusak/(:num)', 'Rusak::delete/$1');
$routes->get('/rusak/(:any)', 'Rusak::detail/$1');

// CRUD Ht
$routes->get('/ht', 'Ht::index');
$routes->post('/ht/save', 'Ht::save');
$routes->post('/ht/update/(:segment)', 'Ht::update/$1');
$routes->get('/ht/create', 'Ht::create');
$routes->get('/ht/edit/(:segment)', 'Ht::edit/$1');
$routes->delete('/ht/(:num)', 'Ht::delete/$1');
$routes->get('/ht/(:any)', 'Ht::detail/$1');

$routes->group('', ['namespace' => 'Myth\Auth\Controllers'], static function($routes){
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::attemptRegister');
    $routes->get('activate-account/(:segment)', 'AuthController::activateAccount/$1');
    $routes->get('resend-activate-account', 'AuthController::resendActivateAccount');
});

// $routes->group('', ['namespace' => 'Myth\Auth\Controllers'], function($routes) {
//     $routes->get('register', 'RegistrationController::register', ['as' => 'register']);
//     $routes->post('register', 'RegistrationController::attemptRegister');
//     $routes->get('activate-account', 'RegistrationController::activateAccount', ['as' => 'activate-account']);
//     $routes->get('resend-activate-account', 'RegistrationController::resendActivateAccount', ['as' => 'resend-activate-account']);
// });




// User group (akses terbatas user)
$routes->group('user', ['filter' => 'user'], function($routes) {
    $routes->get('index', 'User::index');
    $routes->get('profile', 'User::profile');
    $routes->get('dashboard', 'User::dashboard');
});



//Reset Password (tanpa filter)
$routes->get('forgot', 'PasswordReset::forgot');
$routes->post('forgot', 'PasswordReset::sendResetLink');
$routes->get('reset-password/(:any)', 'PasswordReset::resetForm/$1');
$routes->post('reset-password', 'PasswordReset::resetPassword');

// $routes->get('forgot', 'AuthController::forgotPassword');
// $routes->post('forgot', 'AuthController::attemptForgot');
// $routes->get('reset-password', 'AuthController::resetPassword');
// $routes->post('reset-password', 'AuthController::attemptReset');


// Admin group (akses terbatas admin)
$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
    // Dashboard admin
    $routes->get('/', 'Admin::index');
    $routes->get('index', 'Admin::index');

    // Log aktivitas
    $routes->get('logs', 'LogController::index');
    $routes->get('(:num)', 'Admin::detail/$1');

    // Role management
$routes->get('editRole', 'Admin::editRoleList');            
$routes->get('editRole/(:num)', 'Admin::editRoleForm/$1');   
$routes->post('updateRole/(:num)', 'Admin::updateRole/$1');  

});

// Override Auth (login/logout)
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');


// Profile
$routes->get('profile', 'Profile::index');  
$routes->get('profile/edit', 'Profile::edit');    
$routes->post('profile/update', 'Profile::update'); 


$routes->get('/export-users', 'ExportController::exportUsers');
$routes->get('/export/users', 'ExportController::exportExcel');


$routes->get('/sparepart/export', 'Sparepart::exportSparepart');

$routes->get('/test-pdf', 'ExportController::testPdf');

$routes->get('/sparepart/export-pdf', 'Sparepart::exportSparepartPdf');

// Sparepart Import
$routes->get('/sparepart/import', 'Sparepart::importView');
$routes->post('/sparepart/importExcel', 'Sparepart::importExcel');


















