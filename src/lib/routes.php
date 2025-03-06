<?php

session_start();
use \Bramus\Router\Router;
use Homer\CitasMvc\Middlewares\Auth as AuthMiddleware;

$router = new Router();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

require 'config.php';

// namespace of the controller to routes
$router->setNamespace('Homer\CitasMvc\Controllers');

// middlewares
$router->before('GET|POST', '/admin', function() {
  AuthMiddleware::private();
});
$router->before('GET|POST', '/admin/.*', function() {
  AuthMiddleware::private();
});

$router->get('/', 'PagesController@home');
$router->get('/blog/{slug}', 'PagesController@post');

// rutas para crud de clientes
$router->get('/admin/publicaciones', 'PostsController@index');
$router->get('/admin/publicaciones/crear', 'PostsController@create');
$router->get('/admin/publicaciones/editar/{id}', 'PostsController@edit');
$router->post('/admin/publicaciones/crear', 'PostsController@store');
$router->post('/admin/publicaciones/editar/{id}', 'PostsController@update');
$router->post('/admin/publicaciones/eliminar/{id}', 'PostsController@destroy');

$router->get('/admin/categorias', 'CategoriesController@index');
$router->get('/admin/categorias/crear', 'CategoriesController@create');
$router->get('/admin/categorias/editar/{id}', 'CategoriesController@edit');
$router->post('/admin/categorias/crear', 'CategoriesController@store');
$router->post('/admin/categorias/editar/{id}', 'CategoriesController@update');
$router->post('/admin/categorias/eliminar/{id}', 'CategoriesController@destroy');

// auth routes
$router->get('/login', 'AuthController@loginForm');
$router->get('/registro', 'AuthController@registerForm');
$router->post('/registro', 'AuthController@register');
$router->post('/login', 'AuthController@login');
$router->post('/logout', 'AuthController@logout');

// error 404
$router->set404('PagesController@error_404');

$router->run();