<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');
$router->get('/cadastro', 'LoginController@cadastrar');
$router->post('/cadastro', 'LoginController@cadastrarAction');
$router->get('/sair', 'LoginController@sair');
$router->get('/perfil', 'UserController@index');

$router->get('/produtos', 'ProdutoController@index');