<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow Laravel's naming convention
    protected $table = 'roles';

    // Specify the primary key type as UUID
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    // Disable auto-increment for UUIDs
    public $incrementing = false;

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'description',
    ];

    
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    
}
