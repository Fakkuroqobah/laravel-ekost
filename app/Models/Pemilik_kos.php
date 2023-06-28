<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Pemilik_kos extends Authenticatable
{
    use Notifiable;

    protected $guard = 'pemilik-kos';
    
    protected $table = 'pemilik_kos';
    protected $guarded = ['id'];

    public function kos ()
    {
        return $this->hasMany(Kos::class, 'id_pemilik', 'id');
    }
}
