<?php
namespace App\Controllers;

class BaseController {
    protected $templateEngine;
    
    public function __construct() {
        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $this->templateEngine = new \Twig\Environment($loader, array(
            'debug' => true,
            'cache' => false
        ));
    }

    public function render($filename, $data=[]) {
        return $this->templateEngine->render($filename, $data);
    }
}
?>