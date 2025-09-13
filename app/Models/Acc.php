<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Acc extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'accs';

    protected $fillable = [
        'name',
        'birthdate',
        'age',
        'gender',
        'accid',
        'username',
        'password',
        'role',
        'qr_code',
    ];

    protected $hidden = ['password'];
}
