<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    protected $table = 'kos';
    protected $guarded = ['id'];

    public function pemilik ()
    {
        return $this->belongsTo(Pemilik_kos::class, 'id_pemilik', 'id');
    }

    public function fasilitas ()
    {
        return $this->belongsToMany(Fasilitas::class);
    }

    public function users ()
    {
        return $this->belongsToMany(User::class, 'id_user');
    }
}
