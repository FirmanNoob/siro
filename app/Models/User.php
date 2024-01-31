<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Pelatihan;
use App\Models\userPelatihan;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nik',
        'jabatan',
        'nip',
        'str',
        'jkelamin',
        'tlahir',
        'agama',
        'pterakhir',
        'pangkat',
        'alamat',
        'nohp',
        'avatar',
    ];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/user.png');
        }
        return asset('images/' . $this->avatar);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'created_at' => 'datetime'
    ];

    // public function pelatihan()
    // {
    //     return $this->belongsToMany(User::class, Pelatihan::class, 'user_pelatihan')->withTimestamps();
    // }
    public function trainings()
    {
        return $this->hasMany(userPelatihan::class);
    }
}
