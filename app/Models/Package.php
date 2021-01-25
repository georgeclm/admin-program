<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $guarded = [];
    // for the package query to take all the data to the lead controller where the status is active 
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
        ->orderByDesc('id');
    }
}
