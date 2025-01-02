<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\CatalogController;
 
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('catalogs', [CatalogController::class, 'index']);
$routes->post('catalogs/update_view', [CatalogController::class, 'update_view']);
$routes->post('catalogs', [CatalogController::class, 'update']);  
$routes->get('catalogs/new', [CatalogController::class, 'new']); 
$routes->get('catalogs/(:segment)', [CatalogController::class, 'edit']); 

$routes->get('api/catalogs', [CatalogController::class, 'api']);
$routes->get('api/catalogs/(:segment)', [CatalogController::class, 'api']);  
