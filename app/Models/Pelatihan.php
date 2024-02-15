<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\userPelatihan;
use App\Models\Session;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table = 'pelatihan';
    protected $primaryKey = 'id';
    // protected $dates = ['tanggal_awal'];
    protected $casts = [
        'tanggal_awal' => 'datetime',
        'tanggal_berakhir' => 'datetime'
    ];
    protected $guarded = [];

    public function pesertas()
    {
        return $this->hasMany(userPelatihan::class);
    }

    public function jumlahPeserta()
    {
        return $this->pesertas->count();
    }

    public function sesiPelatihans()
    {
        return $this->hasMany(Sesi::class, 'pelatihan_id');
    }
}
