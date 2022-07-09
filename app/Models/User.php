<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'is_admin',
        'role',
        'email_verified_at',
        'login_type',
        'blocked',
        'isDeleted',
        'subscribed',
        'subscribe_expiry_date',
        'subscribe_plan',
        'subscribe_token',
        'sub_type',
        'user_otp',
    ];

    //has many membership
    public function membership()
    {
        return $this->hasMany('App\Models\Membership');
    }

    //has many comments
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
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
    ];
}
