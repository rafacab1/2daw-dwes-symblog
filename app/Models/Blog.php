<?php
require_once("DBAbstractModel.php");
class Blog extends DBAbstractModel {

    private static $instancia;
    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __construct() {
        $this->_created = new DateTime();
        $this->_updated = new DateTime();
        $this->_comments = array();
    }

    public function setTitle($title) {
        $this->_title = $title;
    }

    public function setBlog($blog) {
        $this->_blog = $blog;
    }

    public function setAuthor($author) {
        $this->_author = $author;
    }

    public function setImage($img) {
        $this->_image = $img;
    }

    public function setTags($tags) {
        $this->_tags = $tags;
    }

    public function setCreated($created) {
        $this->_created = $created;
    }

    public function setUpdated($updated) {
        $this->_updated = $updated;
    }

    // Getters
    public function getTitle() {
        return $this->_title;
    }

    public function getBlog() {
        return $this->_blog;
    }

    public function getAuthor() {
        return $this->_author;
    }

    public function getImage() {
        return $this->_image;
    }

    public function getTags() {
        return $this->_tags;
    }

    public function getCreated() {
        return $this->_created;
    }

    public function getUpdated() {
        return $this->_updated;
    }

    public function getComments() {
        return $this->_comments;
    }


    // BD
    public function set() {
        $this->query = "INSERT INTO blog(titulo, autor, blog, tags) VALUES(:titulo, :autor, :blog, :tags)";
        // $this->parametros['id']=$id;
        $this->parametros['titulo']=$this->_title;
        $this->parametros['autor']=$this->_author;
        $this->parametros['blog']=$this->_blog;
        $this->parametros['tags']=$this->_tags;
        $this->get_results_from_query();
        // $this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
    }


    // Métodos

    public function addComment($comentario) {
        array_push($this->_comments, $comentario);
    }
}
?>