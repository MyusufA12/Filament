<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matkul extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliahs';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
        'dosen_id'
    ];

    public function dosen()
{
    return $this->belongsTo(Dosen::class, 'dosen_id'); // sesuaikan dengan nama kolom yang ada
}
}
