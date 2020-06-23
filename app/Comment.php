<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text'
    ];

    /**
     * Relationship: Posts (1 - *)
     */
    public function post()
    {

        return $this->belongsTo('App\Post');
    }
    // Relationship: User (1 - *)
    public function user()
    {

        return $this->belongsTo('App\User');
    }
}
