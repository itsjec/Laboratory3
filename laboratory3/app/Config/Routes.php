<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('test', 'MainController::test');
$routes->get('login', 'MainController::showLoginForm');
$routes->post('login', 'MainController::login');
$routes->add('auth/login', 'MainController::login'); // For handling login requests
$routes->add('auth/register', 'MainController::register'); // For handling registration requests
$routes->get('Showadmin', 'MainController::admin');
$routes->get('/AddProduct.php', 'MainController::displayaddproduct');
$routes->get('/login.php', 'MainController::displaylogin');
$routes->get('/adminUpdate.php', 'MainController::displayupdate');
$routes->get('/adminProducts.php', 'MainController::displayprod');
$routes->get('index.php', 'MainController::displayhome');
$routes->post('addProducts', 'MainController::addProducts');
$routes->get('edit_product', 'MainController::editProduct');
$routes->get('delete/(:num)', 'MainController::delete/$1');
$routes->get('users', 'MainController::displayUsers');
$routes->get('adminUpdate/(:num)', 'MainController::editProduct/$1');
$routes->get('/products', 'MainController::displayProducts');
$routes->post('updateProduct', 'MainController::updateProduct');



