<?php
namespace App\Controllers;

class ErrorsController extends BaseController {
    public function notFound() {
        return $this->render('notFound.twig');
    }
}
?>