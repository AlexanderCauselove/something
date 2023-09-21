<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Detail extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'company',
        'phone',
        'address',
    ];

    function user() {
        return $this->belongsTo(User::class);
    }
}
