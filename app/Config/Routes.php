<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Articles::index');
$routes->get('articles/view/(:num)', 'Articles::view/$1');
