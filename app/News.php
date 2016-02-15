<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $fillable = [
        'preview', 'previewtype', 'previewsize', 'title', 'subtitle', 'content', 'youtube_video', 'votes_sum', 'votes_count', 'idCategory', 'idUser',
    ];

    public function comment()
    {
        return $this->hasMany('App\Comment','idNews');
    }

    public function photo()
    {
        return $this->hasMany('App\Photo','idNews');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'idUser');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'idCategory');
    }
}
