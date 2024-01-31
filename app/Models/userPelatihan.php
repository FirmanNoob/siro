<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelatihan;
use App\Models\User;

class userPelatihan extends Model
{
    use HasFactory;
    protected $table = 'user_pelatihan';
    protected $fillable = ['user_id', 'pelatihan_id', 'is_approved', 'certificate_path'];

    public function pelatihan()
    {
        // return $this->belongsToMany(User::class, Pelatihan::class, 'user_pelatihan')->withTimestamps();
        return $this->belongsTo(Pelatihan::class);
    }
    public function user()
    {
        // return $this->belongsToMany(User::class, Pelatihan::class, 'user_pelatihan')->withTimestamps();
        return $this->belongsTo(User::class);
    }
}
