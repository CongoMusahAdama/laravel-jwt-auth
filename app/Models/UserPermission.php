<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userpermission extends Model
{
    protected $table = 'user_permissions';

    protected $fillable = ['user_id', 'permission_id'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Permission
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
