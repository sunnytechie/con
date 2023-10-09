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
        'google_id',
        'blocked',
        'isDeleted',
        'subscribed',
        'subscribe_expiry_date',
        'subscribe_plan',
        'subscribe_token',
        'sub_type',
        'user_otp',
        'avatar',
        'cover_photo',
        'gender',
        'date_of_birth',
        'phone',
        'about_me',
        'location',
        'qualification',
        'facebook',
        'twitter',
        'linkdln',
        'notify_token',
        'show_dateofbirth',
        'show_phone',
        'notify_follows',
        'notify_comments',
        'notify_likes',
        'activated',
        'online_status',
        'last_seen_date',
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

    //has many posts
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    //has many postcomments
    public function postcomments()
    {
        return $this->hasMany('App\Models\Postcomment');
    }

    //has many postlikes
    public function postlikes()
    {
        return $this->hasMany('App\Models\Postlike');
    }

    //has many savedposts
    public function savedposts()
    {
        return $this->hasMany('App\Models\Savedpost');
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

    //has one profile
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
}
