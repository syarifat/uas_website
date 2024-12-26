<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    // Fungsi ini akan digunakan oleh Passport untuk menemukan user berdasarkan username
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }
    protected $fillable = [
        'name', 'username', 'password',
    ];

    // // Ganti autentikasi untuk menggunakan username
    // public function findForPassport($username)
    // {
    //     return $this->where('username', $username)->first();
    // }

    // Ganti aturan autentikasi untuk menggunakan username
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }
}

