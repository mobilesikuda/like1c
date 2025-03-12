<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\CatalogController;
use App\Controllers\Home;
 
/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index']);
$routes->get('catalogs', [CatalogController::class, 'index']);
$routes->post('catalogs/update_view', [CatalogController::class, 'update_view']);

$routes->post('catalogs', [CatalogController::class, 'update']);  
$routes->get('catalogs/new', [CatalogController::class, 'new']); 
$routes->get('catalogs/(:num)', [CatalogController::class, 'edit']); 

$routes->get('api/catalogs', [CatalogController::class, 'api']);
$routes->get('api/catalogs/(:num)', [CatalogController::class, 'api']);  

