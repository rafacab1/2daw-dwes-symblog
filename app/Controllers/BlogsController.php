<?php
namespace App\Controllers;
use App\Models\Blog;
use Respect\Validation\Validator as v;

class BlogsController extends BaseController {
    public function getAddBlogAction() {
        return $this->render('addBlog.twig', array("nEntrada"=>"Nueva entrada"));
    }
    
    public function postAddBlogAction($request) {
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            // Mensaje
            $msg = null;
            $error = false;
            // Definición de la validación
            $validador = v::key('titulo', v::stringType()->notEmpty())->key('descripcion', v::stringType()->notEmpty());

            try {
                // Validar datos
                $validador->assert($postData);
                $blog = new Blog();
                $blog->titulo = $postData['titulo'];
                $blog->blog = $postData['descripcion'];
                $blog->tags = $postData['tags'];
                $blog->autor = $postData['autor'];
                // Archivos
                $files = $request->getUploadedFiles();
                $image = $files['image'];
                if ($image->getError() == UPLOAD_ERR_OK) {
                    $nombreArchivo = $image->getClientFilename();
                    $nombreArchivo = "img/" . uniqid().$nombreArchivo;
                    $image->moveTo($nombreArchivo);
                    $blog->imagen = $nombreArchivo;
                }
                $blog->save();
                $msg = "Entrada guardada";
            } catch (\Exception $e) {
                // $msg = $e->getMessage();
                $msg = "Debes rellenar al menos el título y la descripción.";
                $error = true;
            }
        }
        return $this->render('addBlog.twig', array("nEntrada"=>"Nueva entrada", "msg"=>$msg, "error"=>$error));
    }
}

?>