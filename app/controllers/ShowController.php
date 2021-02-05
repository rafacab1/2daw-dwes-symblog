<?php
namespace App\Controllers;
use App\Models\Blog;

class ShowController {
    public function showAction() {
        // Blogs
        $blogs = Blog::all();
        include '..\views\index.php';
    }
}

?>