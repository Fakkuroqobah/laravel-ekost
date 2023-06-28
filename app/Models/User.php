<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;
    
	protected $table = 'users';
    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kos ()
    {
        return $this->belongsToMany(Kos::class, 'pesan');
    }
}
