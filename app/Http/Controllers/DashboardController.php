<?php

namespace App\Http\Controllers;
use App\Models\Reminder;


use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // to query the database take the date and that is today and the format y month day in database the user id and the status must be pending and store inside reminders
        $reminders = Reminder::query()
        // this with have to mention the relationship between two database this is where have to mention that reminder belongsto lead
        ->with(['lead'])
        ->where('reminders.reminder_date', now()->format('Y-m-d'))
        ->where('reminders.user_id',Auth::user()->id)
        ->where('reminders.status','pending')
        ->get();
        $data = [
            'reminders'=> $reminders,

        ];
        return Inertia::render('Dashboard/Index',$data);
    }
}
