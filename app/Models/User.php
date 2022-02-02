<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'image' => 'array'
    ];

    protected $attributes = ['image' => '[]'];

    public function jobs(){
        return $this->belongsToMany(Job::class)->withTimestamps();
    }

    public function profile(){
        return $this->hasOne(ApplicantProfile::class);
    }

    public static function byPhone($phone){
        return static::wherePhone($phone)->first();
    }
}
