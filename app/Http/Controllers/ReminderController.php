<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Inertia\Inertia;
class ReminderController extends Controller
{
    public function add(Lead $lead)
    {
        return Inertia::render('Leads/LeadReminderAdd',[
            'lead'=>$lead,
        ]);
    }
}
