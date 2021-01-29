<?php
namespace app\Models;
class Comment {

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
            return new \Datetime();
        }
    }
}
?>