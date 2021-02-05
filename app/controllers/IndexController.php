<?php
namespace App\Controllers;
use App\Models\Blog;

class IndexController {
    public function indexAction() {
        // Blogs
        $blogs = Blog::all();
        include '..\views\index.php';
    }
}

?>