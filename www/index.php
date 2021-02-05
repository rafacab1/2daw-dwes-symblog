<?php

// Manejando php.ini desde código
// para que se nos muestren los errores
ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use App\Models\Blog;
use Aura\Router\RouterContainer;
// Eloquent
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'symblog',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

// Diactoros
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

// Contenedor de rutas
$routerContainer = new RouterContainer();

// Mapa de rutas
$map = $routerContainer->getMap();
// Los parámetros de get son nombre de ruta, url y respuesta
$map->get('index', '/', ['controller'=>'App\Controllers\IndexController','action'=>'indexAction']);
$map->get('addBlog', '/blogs/add', ['controller'=>'App\Controllers\BlogsController', 'action'=>'getAddBlogAction']);
$map->post('addBlogPost', '/blogs/add', ['controller'=>'App\Controllers\BlogsController', 'action'=>'postAddBlogAction']);
// TODO: Implementar show
$map->get('show', '/blogs/', ['controller'=>'App\Controllers\ShowController', 'action'=>'showAction']);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if (!$route) {
    echo 'No route';
} else {
    // Aprovechamos la posibilidad que nos da php
    // de crear clases con el nombre almacenado en
    // una variable
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $controller->$actionName();
}
?>