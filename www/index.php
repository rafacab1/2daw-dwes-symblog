<?php

// Manejando php.ini desde código
// para que se nos muestren los errores
ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

// Inicio de sesión
session_start();

require_once '../vendor/autoload.php';
use Aura\Router\RouterContainer;
// Eloquent
use Illuminate\Database\Capsule\Manager as Capsule;

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '\..' , 'dbconnect.env');
// $dotenv->load();

$DATABASE_URL = parse_url(getenv("DATABASE_URL"));

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'pgsql',
    'host'      => $DATABASE_URL["host"],
    'port'      => $DATABASE_URL["port"],
    'database'  => ltrim($DATABASE_URL["path"], "/"),
    'username'  => $DATABASE_URL["user"],
    'password'  => $DATABASE_URL["pass"],
    'charset'   => 'utf8',
    'prefix'    => '',
    'schema' => 'public',
    'sslmode' => 'require',
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
$map->get('addBlog', '/blogs/add', ['controller'=>'App\Controllers\BlogsController', 'action'=>'getAddBlogAction', 'auth' => true]);
$map->post('addBlogPost', '/blogs/add', ['controller'=>'App\Controllers\BlogsController', 'action'=>'postAddBlogAction', 'auth' => true]);
// show
$map->get('showBlog', '/blogs/{id}', ['controller'=>'App\Controllers\ShowController', 'action'=>'getShowBlog'])->tokens(['id'=>'\d+']);
// show - postComment
$map->post('postComment', '/blogs/{id}', ['controller'=>'App\Controllers\ShowController', 'action'=>'postComment'])->tokens(['id'=>'\d+']);
// /users/login
$map->get('loginGet', '/users/login', ['controller' => 'App\Controllers\AuthController', 'action' => 'getLogin']);
$map->post('loginPost', '/users/login', ['controller' => 'App\Controllers\AuthController', 'action' => 'postLogin']);
// /users/add
$map->get('addUserGet', '/users/add', ['controller'=>'App\Controllers\AddUserController', 'action'=>'addUser', 'auth' => true]);
$map->post('addUserPost', '/users/add', ['controller'=>'App\Controllers\AddUserController', 'action'=>'addUser', 'auth' => true]);
// Admin dashboard
$map->get('adminDashboard', '/admin', ['controller' =>  'App\Controllers\AdminController', 'action' => 'getCPAdmin', 'auth' => true]);
// Logout
$map->get('logout', '/logout', ['controller' => 'App\Controllers\AuthController', 'action' => 'getLogout']);
// 404
$map->get('notFound', '/404', ['controller' => 'App\Controllers\ErrorsController', 'action' => 'notFound']);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if (!$route) {
    $failedRoute = $matcher->getFailedRoute();

    switch ($failedRoute) {
        case 'Aura\Router\Rule\Allows':
            echo 'Error 405';
            break;
        case 'Aura\Router\Rule\Accepts';
            echo 'Error 406';
            break;
        default:
            header('Location: /404');
            break;
    }
} else {
    // Aprovechamos la posibilidad que nos da php
    // de crear clases con el nombre almacenado en
    // una variable
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    
    // Autenticación
    $auth = $handlerData['auth'] ?? false; // ¿Necesita esta ruta autenticación?
    $sessionUser = $_SESSION['user'] ?? null; // ¿Existe el usuario?
    if ($auth && !$sessionUser) {
        // Si necesita autenticación pero no está logueado 
        // va al login
        header('Location: /users/login');
    }

    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    echo $response->getBody();
}
?>