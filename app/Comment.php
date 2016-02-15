<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    protected $fillable = [
        'content', 'username', 'email', 'idNews',
    ];

    public function news()
    {
        return $this->belongsTo('App\News','idNews');
    }
}
