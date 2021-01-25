<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;
    // to make all the field not guarded
    protected $guarded = [];
    // this to make laravel understand that the reminder is belongs to the lead and to make sure in controller it know that there is lead inside reminder
    public function lead()
    {
        // on this one doesnt have to mention the lead_id because inside reminder database already store the name lead_id so the lead already know the connection
        return $this->belongsTo(Lead::class);
    }
    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}
