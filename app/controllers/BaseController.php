<?php
namespace App\Controllers;

use Laminas\Diactoros\Response\HtmlResponse;

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
        $loged = null;
        if (isset($_SESSION['user'])) {
            $loged = $_SESSION['user'];
        }
        $data = array_merge($data, array("user" => $loged));
        return new HtmlResponse($this->templateEngine->render($filename, $data));
    }
}
?>