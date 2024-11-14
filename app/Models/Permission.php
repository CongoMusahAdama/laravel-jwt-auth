<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = ['role', 'permission_name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permissions');
    }

    public function roles()
    {
        return $this->belongsToMany(PermissionRole::class, 'permission_roles');
    }
}

