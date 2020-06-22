<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfos extends Model
{
    public $fillable = [
        'email',
        'address',
        'phone'
    ];

    public $timestamps = false;

    /**
     * Relastionship: Users (1 -1)
     */
    public function user()
    {

        return $this->belongsTo('App\User');
    }
}
