<?php
require_once("DBAbstractModel.php");
class Comment extends DBAbstractModel {

    public function __construct() {
        
    }
    
    public function setUser($user) {
        $this->_user = $user;
    }

    public function setComment($comment) {
        $this->_comment = $comment;
    }

    public function setBlog($blog) {
        $this->_blog = $blog;
    }

    public function setCreated($created) {
        $this->_created = $created;
    }

    public function getUser() {
        return $this->_user;
    }

    public function getComment() {
        return $this->_comment;
    }

    public function getCreated() {
        if (isset($this->_created)) {
            return $this->_created;
        } else {
            return new Datetime();
        }
    }

    // BD
    public function set() {
        $this->query = "INSERT INTO comment(blog_id, user, comment, approved) VALUES(:blogId, :user, :comment, :approved)";
        // $this->parametros['id']=$id;
        $this->parametros['blogId']=$this->_blog->lastInsert();
        $this->parametros['user']=$this->_user;
        $this->parametros['comment']=$this->_comment;
        $this->parametros['approved']=1;
        $this->get_results_from_query();
        // $this->execute_single_query();
        $this->mensaje = 'SH agregado correctamente';
    }
}
?>