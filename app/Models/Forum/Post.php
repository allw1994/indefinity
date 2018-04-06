<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Post extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = ['comments'];
    protected $fillable = ['body'];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function addComment(Comment $comment)
    {
      $comment->post_id = $this->id;
      return $this->comments()->save($comment);
    }
}
