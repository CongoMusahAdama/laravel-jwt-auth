<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = ['name', 'flg_url'];

    // Relationship with Users (One-to-Many)
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Relationship with States (One-to-Many)
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
