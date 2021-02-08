<?php
namespace App\Controllers;
use App\Models\Blog;

class IndexController extends BaseController {
    public function indexAction() {
        // Blogs
        $blogs = Blog::all();
        echo $this->render('index.twig', array("blogs"=>$blogs));
    }
}

?>