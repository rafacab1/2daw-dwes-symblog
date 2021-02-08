<?php
namespace App\Controllers;
use App\Models\Blog;

class BlogsController extends BaseController {
    public function getAddBlogAction() {
        return $this->render('addBlog.twig', array("nEntrada"=>"Nueva entrada"));
    }
    
    public function postAddBlogAction($request) {
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $blog = new Blog();
            $blog->titulo = $postData['titulo'];
            $blog->blog = $postData['descripcion'];
            $blog->tags = $postData['tags'];
            $blog->autor = $postData['autor'];

            // Archivos
            $files = $request->getUploadedFiles();
            var_dump($files);
            $image = $files['image'];
            if ($image->getError() == UPLOAD_ERR_OK) {
                $nombreArchivo = $image->getClientFilename();
                $nombreArchivo = "img/" . uniqid().$nombreArchivo;
                $image->moveTo($nombreArchivo);
                $blog->imagen = $nombreArchivo;
            }

            $blog->save();
            header("Location: /");
        }
    }
}

?>