<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',   
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Ish beruvchi qo‘shgan ishlar
    public function jobPosts()
    {
        return $this->hasMany(JobPost::class);
    }

    // Ish qidiruvchi yuborgan arizalar
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    // Chat xabarlari
    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
}
