<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['body'];

    public function comment()
    {
      return $this->belongsTo(Comment::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

}
