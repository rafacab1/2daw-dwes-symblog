<?php
namespace App\Controllers;
use App\Models\Blog;

class BlogsController {
    public function getAddBlogAction() {
        include '..\views\addBlog.php';
    }
    
    public function postAddBlogAction() {
        if (!empty($_POST)) {
            $blog = new Blog();
            $blog->titulo = $_POST['titulo'];
            $blog->blog = $_POST['descripcion'];
            $blog->tags = $_POST['tags'];
            $blog->autor = $_POST['autor'];
            $blog->save();
            header("Location: /");
        }
    }
}

?>