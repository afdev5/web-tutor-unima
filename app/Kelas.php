<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['nama_kelas', 'tanggal', 'jam', 'narasumber', 'host', 'moderator', 'sertifikat'];

    public function materi()
    {
        return $this->hasOne(Materi::class, 'id_kelas');
    }

    public function link()
    {
        return $this->hasOne(Link::class, 'id_kelas');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'id_kelas');
    }
}
