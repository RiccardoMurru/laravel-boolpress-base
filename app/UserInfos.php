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
}
