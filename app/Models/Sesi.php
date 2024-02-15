<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelatihan;


class Sesi extends Model
{
    use HasFactory;
    protected $table = 'sesi';
    protected $fillable = ['pelatihan_id', 'namasesi', 'tanggal', 'waktuMulai', 'waktuBerakhir', 'deskripsi', 'link'];
    protected $casts = [
        'tanggal' => 'datetime',
    ];

    public function pelatihanS()
    {
        return $this->belongsTo(Pelatihan::class);
    }
}
