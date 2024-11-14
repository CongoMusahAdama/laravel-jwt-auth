<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';

    protected $fillable = ['name', 'state_id', 'country_id', 'owner_id'];

    // Relationship with Users (One-to-Many)
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Relationship with State (One-to-BelongsTo)
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    // Relationship with Country (One-to-BelongsTo)
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Relationship with Owner (One-to-BelongsTo) [Assuming `owner_id` is a foreign key to the User model]
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
