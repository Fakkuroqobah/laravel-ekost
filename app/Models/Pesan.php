<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = "pesan";
    protected $guarded = ['id'];

    public function user ()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kos ()
    {
        return $this->belongsTo(Kos::class, 'id_kos');
    }
}
