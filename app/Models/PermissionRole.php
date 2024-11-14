<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;

    protected $table = 'permission_roles';
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = [
        'id', 'permission_id', 'role_id'
    ];

    // Define relationships with Permission and Role models
    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }

    public function role()
    {
        return $this->belongsTo(PermissionRole::class, 'role_id');
    }
}
