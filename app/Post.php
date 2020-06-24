<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'body'
    ];

    /**
     * Relationship: Users (1 - *)
     */
    public function user()
    {

        return $this->belongsTo('App\User');
    }

    // Relationship: Comments (1 - *)
    public function comments()
    {

        return $this->hasMany('App\Comment');
    }
}
