<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $fillable = ['laporan', 'gambar','user_id','tanggapan','response_at','status'];
    protected $casts = [
        'created_at' => 'datetime',
        'response_at' => 'datetime'
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
