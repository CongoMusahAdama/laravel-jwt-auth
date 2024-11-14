<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;

    protected $table = 'cities';
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = [
        'id', 'state_id', 'name'
    ];

    // Define the relationship with the State model
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
