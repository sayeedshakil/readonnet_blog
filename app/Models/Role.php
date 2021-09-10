<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name',];

        /**
     * The users that belong to the role.
     */
    public function rolesUsers()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
