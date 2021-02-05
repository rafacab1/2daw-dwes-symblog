<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    protected $table = 'blog';

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function numComments() {
        return count(Blog::find($this->id)->comments);
    }
}
?>