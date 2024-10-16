<?php

use App\Controllers\Admin\ApartmentController;
use App\Controllers\Admin\CreateController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\Admin\HomeController;
use App\Controllers\User\Home_User_Controller;
use App\Controllers\Admin\ResidentController;
use App\Controllers\Admin\VehicleController;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/',[HomeController::class,'index']);
$routes->get('home_user',[Home_User_Controller::class,'index']);
$routes->get('/apartment',[ApartmentController:: class,'index']);
$routes->get('/apartment/create',[ApartmentController:: class,'create']);
$routes->post('apartment/create',[ApartmentController:: class,'create']);
$routes->get('/apartment/edit/(:num)',[ApartmentController:: class,'edit/$1']);
$routes->put('/apartment/edit/(:num)',[ApartmentController:: class,'edit/$1']);
$routes->delete('/apartment/delete/(:num)',[ApartmentController:: class,'delete/$1']);
$routes->get('/apartment/search', [ApartmentController:: class,'search']);


$routes->get('/resident', [ResidentController::class,'index']);
$routes->get('/resident/create', [ResidentController::class,'create']);
$routes->post('resident/create', [ResidentController::class,'create']);
$routes->get('resident/edit/(:num)', [ResidentController::class,'edit/$1']);
$routes->put('resident/edit/(:num)', [ResidentController::class,'edit/$1']);
$routes->delete('resident/delete/(:num)', [ResidentController::class,'delete']);
$routes->get('/resident/search', [ResidentController::class,'search']);


$routes->get('/vehicle', [VehicleController::class,'index']);
$routes->get('/vehicle/create', [VehicleController::class,'create']);
$routes->post('/vehicle/create', [VehicleController::class,'create']);
$routes->delete('/vehicle/delete/(:num)', [VehicleController::class,'delete']);

