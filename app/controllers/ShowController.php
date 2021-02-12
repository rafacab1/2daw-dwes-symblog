<?php
namespace App\Controllers;
use App\Models\Blog;
use App\Models\Comment;
use Respect\Validation\Validator as v;

class ShowController extends BaseController {
    public function getShowBlog($request) {
        return $this->render('showBlog.twig', $this->getBlogs(self::getId($request)));
    }

    public function postComment($request) {
        if ($request->getMethod() == 'POST') {
            $post = $request->getParsedBody();
            $msg = null;
            $error = false;
            $validator = v::key('autor', v::stringType()->notEmpty())->key('comentario', v::stringType()->notEmpty());
            
            try {
                // Validate
                $validator->assert($post);
                $comment = new Comment();
                $comment->blog_id = self::getId($request);
                $comment->user = $post['autor'];
                $comment->comment = $post['comentario'];
                $comment->approved = 1;
                $comment->save();
                $msg = "Comentario guardado";
            } catch (\Exception $e) {
                $msg = "Debes rellenar todos los campos.";
                $error = true;
            }
        }
        return $this->render('showBlog.twig', array_merge($this->getBlogs(self::getId($request)), ["msg"=>$msg, "error"=>$error]));
    }
    
    public function getBlogs($id) {
        $blog =  Blog::find($id);
        $comentarios = Blog::find($id)->comments;
        return ['blog'=>$blog, 'comentarios'=>$comentarios];
    }

    private static function getId($r) {
        return substr($r->getUri()->getPath(), 7);
    }
}

?>