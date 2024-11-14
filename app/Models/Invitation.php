<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'invitations';

    protected $fillable = ['email', 'role', 'org_id', 'invited_by'];

    // Relationship with User (The user who sent the invitation)
    public function user()
    {
        return $this->belongsTo(User::class, 'invited_by');
    }

    // Relationship with Organization (The organization to which the invitation was sent)
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }
}
