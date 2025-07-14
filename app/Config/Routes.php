<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'NewsController::index');
$routes->get('news/ajax', 'NewsController::ajaxNews');
