<?php
namespace App\Controllers;
use App\Models\Blog;

class ShowController extends BaseController {
    public function showBlog($request) {
        // Blogs
        $id = substr($request->getUri()->getPath(), 7);
        $blog =  Blog::find($id);
        $comentarios = Blog::find($id)->comments;
        return $this->render('showBlog.twig', ['blog'=>$blog, 'comentarios'=>$comentarios]);
    }
}

?>