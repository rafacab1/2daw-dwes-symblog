<?php
namespace App\Controllers;
use App\Models\Blog;

class BlogsController extends BaseController {
    public function getAddBlogAction() {
        echo $this->render('addBlog.twig', array("nEntrada"=>"Nueva entrada"));
    }
    
    public function postAddBlogAction($request) {
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $blog = new Blog();
            $blog->titulo = $postData['titulo'];
            $blog->blog = $postData['descripcion'];
            $blog->tags = $postData['tags'];
            $blog->autor = $postData['autor'];
            $blog->save();
            header("Location: /");
        }
    }
}

?>