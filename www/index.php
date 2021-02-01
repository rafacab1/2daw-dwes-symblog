<?php

// Manejando php.ini desde código
// para que se nos muestren los errores
ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use App\Models\Blog;

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

$blogs = Blog::all();

if (!empty($_POST)) {
    $blog = new Blog();
    $blog->titulo = $_POST['titulo'];
    $blog->blog = $_POST['descripcion'];
    $blog->tags = $_POST['tags'];
    $blog->autor = $_POST['autor'];
    $blog->save();
    header("Location: ?route=/");
}

$route = $_GET['route'] ?? '/';
if ($route == '/') {
    // index
    require '../index.php';
} elseif ($route == 'add') {
    // Add blog
    require '../addBlog.php';
} elseif ($route == 'show') {
    $theBlog = $blogs->where('id', '=', $_GET['id'])[$_GET['id']-1];
    require '../show.php';
} else {
    print_r($_GET);
    echo "No route";
}
?>