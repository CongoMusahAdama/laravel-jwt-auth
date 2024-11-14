<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $fillable = ['name', 'country_id'];

    // Relationship with Country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Relationship with Users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Relationship with Organizations
    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }
}
