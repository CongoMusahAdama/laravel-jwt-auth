<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;  //allowing users to be soft deleted

    //properties
    protected $table = 'users';
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'dob',
        'status',
        'password',
        'country_id',
        'state_id',
        'org_id',
        'roles',
        'preferences',
        'image',
    ];

    protected $casts = [
        'dob' => 'datetime',  //casting dob as a datetime
        'preferences' => 'array',   //allowing it to be stored as JSON in the db and accessed as an array in the application
    ];


    // Relationships or functions 
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }
    
    public function roles()
    {
        return $this->belongsToMany(PermissionRole::class, 'permission_roles');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class, 'invited_by');
    }
}
