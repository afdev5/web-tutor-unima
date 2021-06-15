<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = ['nip', 'nama', 'nidn', 'nama', 'fakultas', 'prodi', 'no_hp', 'no_wa', 'email', 'id_kelas', 'status'];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
