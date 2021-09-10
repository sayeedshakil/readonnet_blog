<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    use HasFactory;

    public $table = 'permissions';

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    // ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function permissionsRoles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
