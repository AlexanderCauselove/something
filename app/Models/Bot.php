<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Bot extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'start_time',
        'status',
    ];

    function user() {
        return $this->belongsTo(User::class);
    }
}
