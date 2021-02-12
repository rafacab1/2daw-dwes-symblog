<?php
namespace App\Controllers;

class AdminController extends BaseController {
    public function getCPAdmin() {
        return $this->render('admin.twig');
    }
}
?>