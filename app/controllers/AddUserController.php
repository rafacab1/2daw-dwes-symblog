<?php
namespace App\Controllers;
use App\Models\User;
use Respect\Validation\Validator as v;

class AddUserController extends BaseController {
    public function addUser($request) {
        // Mensaje
        $msg = null;
        $error = false;
        
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            // Definición de validación
            $validador = v::key('email', v::email());
            
            try {
                $validador->assert($postData);
                $user = new User();
                $user->email = $postData['email'];
                $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);
                $user->save();
                $msg = "Usuario añadido";
            } catch (\Exception $e) {
                $msg = "Correo electrónico incorrecto.";
                $error = true;
            }
        }
        return $this->render('addUser.twig', array('msg'=>$msg, 'error'=>$error));
    }
}