<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\CatalogController;
 
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('catalogs', [CatalogController::class, 'index']);  
