<?php namespace Config;

// Create a new instance of our RouteCollection class.

$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.

if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('MainController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Main
$routes->get('/', 'MainController::index');
$routes->get('main', 'MainController::index');
$routes->get('main/(:alphanum)', 'MainController::index/$1');

//Client
$routes->get('client', 'ClientController::index');
$routes->get('getclient', 'ClientController::getAll');
$routes->get('getclientbynamecpf/(:alphanum)', 'ClientController::getClientByNameCpf/$1');
$routes->post('insertclient', 'ClientController::insert');
$routes->post('deleteclient', 'ClientController::delete');
$routes->post('updateclient', 'ClientController::update');

//Uf
$routes->get('getufbyinitials/(:alphanum)', 'UfController::getByInitials/$1');

//City
$routes->get('getcitybyuf/(:alphanum)', 'CityController::getByUf/$1');
$routes->get('getcityibge/(:alphanum)', 'CityController::getByIbge/$1');

//FormPay
$routes->get('formpay', 'FormPayController::index');
$routes->get('getformpay', 'FormPayController::getAll');
$routes->post('insertformpay', 'FormPayController::insert');
$routes->post('updateformpay', 'FormPayController::update');
$routes->post('deleteformpay', 'FormPayController::delete');

//TireSize
$routes->get('tiresize', 'TireSizeController::index');
$routes->get('gettiresize', 'TireSizeController::getAll');
$routes->post('inserttiresize', 'TireSizeController::insert');
$routes->post('updatetiresize', 'TireSizeController::update');
$routes->post('deletetiresize', 'TireSizeController::delete');

//TireBand
$routes->get('tireband', 'TireBandController::index');
$routes->get('gettireband', 'TireBandController::getAll');
$routes->post('inserttireband', 'TireBandController::insert');
$routes->post('updatetireband', 'TireBandController::update');
$routes->post('deletetireband', 'TireBandController::delete');

//TireBrand
$routes->get('tirebrand', 'TireBrandController::index');
$routes->get('gettirebrand', 'TireBrandController::getAll');
$routes->post('inserttirebrand', 'TireBrandController::insert');
$routes->post('updatetirebrand', 'TireBrandController::update');
$routes->post('deletetirebrand', 'TireBrandController::delete');

//User 
$routes->post('login', 'UserController::login');
$routes->get('login', 'UserController::index');
$routes->get('logout', 'UserController::logout');

//Order service
$routes->get('orderservice', 'OrderServiceController::index'); 
$routes->get('neworderservice/(:num)', 'OrderServiceController::newOrderService/$1'); 
$routes->post('openOrderService', 'OrderServiceController::insert'); 

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
