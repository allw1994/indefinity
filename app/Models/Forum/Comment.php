<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Comment extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $fillable = ['body'];
    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = ['responses'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addResponse(Response $response)
    {
        $response->comment_id = $this->id;
        return $this->responses()->save($response);
    }

    public function delComment()
    {
        return $this->delete();
    }
}
