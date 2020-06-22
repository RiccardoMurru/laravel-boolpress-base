<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
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
}