<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "photos";

    protected $fillable = [
        'image', 'type', 'size', 'idNews',
    ];

    public function news()
    {
        return $this->belongsTo('App\News', 'idNews');
    }
}
