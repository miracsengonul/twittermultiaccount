<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ChildUser extends Authenticatable
{
    use Notifiable;
    protected $table = 'child_users';
    protected $fillable = ['name','handle','twitter_id','avatar','user_id','token','tokenSecret'];	
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps=false;	
}
