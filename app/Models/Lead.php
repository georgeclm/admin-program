<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lead extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function reminders()
    {
        return $this->hasMany(Reminder::class)
        ->orderByDesc('id');
    }
    // this function to change the format from the database and for each by format 'get{Firstletterwithfirstword capital}{secondletterwithfirstwordcapitalize}Attribute' this function will be called in the model
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d');

    }
}

