<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;          // User modelni import qilish uchun
use App\Models\Application;  // Application modelni import qilish uchun

class job_post extends Model  // <-- JobPost emas, job_post (fayl nomiga mos)
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'salary',
        'work_time',
        'location',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}