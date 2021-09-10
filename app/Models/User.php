<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'unique_user_id',
        'phone',
        'image',
        'about_title',
        'about_description',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'linkedin_link',
        'expertise',
        'interested_in',
    ];

    public static function boot(){
        parent::boot();

        static::creating(function($user){
            $user->unique_user_id = 'user'.'-'.str_pad($user->withTrashed()->max('id')+1, 6,'110000', STR_PAD_LEFT);

        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
        /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

        /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }


}
