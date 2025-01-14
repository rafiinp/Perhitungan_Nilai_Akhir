<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'NilaiController::index');
$routes->get('nilai', 'NilaiController::index');
$routes->post('nilai/hitung', 'NilaiController::hitung');
$routes->get('nilai/edit/(:num)', 'NilaiController::edit/$1');
$routes->post('nilai/update/(:num)', 'NilaiController::update/$1');
$routes->post('nilai/delete/(:num)', 'NilaiController::delete/$1');
