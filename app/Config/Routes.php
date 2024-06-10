<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Ruta por defecto
$routes->get('/', 'Home::index');

// Rutas para autenticación
$routes->get('login', 'Auth::login');
$routes->post('auth/attemptLogin', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');

// Rutas para Productos (Aseguradas)
$routes->get('productos', 'Productos::index');
$routes->get('productos/create', 'Productos::create');
$routes->post('productos/store', 'Productos::store');
$routes->get('productos/edit/(:segment)', 'Productos::edit/$1');
$routes->post('productos/update/(:segment)', 'Productos::update/$1');
$routes->get('productos/delete/(:segment)', 'Productos::delete/$1');

// Rutas para Usuarios (Aseguradas)
$routes->get('usuarios', 'Usuarios::index');
$routes->get('usuarios/create', 'Usuarios::create');
$routes->post('usuarios/store', 'Usuarios::store');
$routes->get('usuarios/edit/(:segment)', 'Usuarios::edit/$1');
$routes->post('usuarios/update/(:segment)', 'Usuarios::update/$1');
$routes->get('usuarios/delete/(:segment)', 'Usuarios::delete/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}