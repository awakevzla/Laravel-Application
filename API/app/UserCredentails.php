<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCredentials extends Model
{
    protected $table = 'UserCredentials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usercredentialsid', 'email', 'password', 'salt', 'usertype'
    ];

}
