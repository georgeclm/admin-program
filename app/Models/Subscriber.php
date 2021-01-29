<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Subscriber extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getRenewalDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
