<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Reminder;

use Inertia\Inertia;
class ReminderController extends Controller
{
    public function add(Lead $lead)
    {
        return Inertia::render('Leads/LeadReminderAdd',[
            'lead'=>$lead,
        ]);
    }
    public function store(Request $requset)
    {
        // validate the post data
        $postData = $this->validate($requset,[
        'reminder' => 'required|min:3',
        'reminder_date' => 'required|date',
        // to mention this lead id and must exists inside leads table and the id 
        'lead_id' => 'required|exists:leads,id',
        ]);   
        // set the default user id and the status will always be pending
        $postData['user_id']= $requset->user()->id;
        $postData['status'] = 'pending';

        $lead = Lead::find($postData['lead_id']);
        // use this reminders that already mention inside the Lead relationship and create the reminders 
        $lead->reminders()->create($postData);
        return redirect()->route('lead.view',[$lead]);
        
    }
    // to create anything first of all create the link inside web.php and all the parameter that needed in this case the lead id and reminder 
    // after have the link go to the controller and create the function and pass the parameter that needed from the web.php 
    // then make the view inside vue and set the value that needed to display as prop
    // then back to the controller connect to the vue and send the property from parameter to the vue
    // then after all already been passed then create then set the button href to the name inside web.php and pass the property that needed to take
    public function view(Lead $lead, Reminder $reminder)
    {
        return Inertia::render('Leads/ReminderView',[
            'lead' =>$lead,
            'reminder'=> $reminder,
        ]);
    }
    public function updateAndCreate(Request $request)
    {
        $postData = $this->validate($request,[
            'reminder_id'=>'required|exists:reminders,id',
        ]);
        $reminder = Reminder::find($postData['reminder_id']);
        $reminder->status = 'completed';
        $reminder->save();
        $lead = Lead::find($reminder->lead_id);
        return redirect()->route('reminder.add',['lead'=>$lead]);
    }
    public function addNote(Lead $lead, Reminder $reminder)
    {
        return Inertia::render('Leads/ReminderNote',[
            'lead'=> $lead,
            'reminder'=> $reminder,

        ]);
    }
    public function close(Request $request)
    {
        $postData = $this->validate($request,[
            'reminder_id'=> 'required|exists:reminders,id',
            'note' => 'required|min:3',
        ]);
        $reminder = Reminder::find($postData['reminder_id']);
        $reminder->status = 'completed';
        $reminder->save();

        $lead = Lead::find($reminder->lead_id);
        return redirect()->route('lead.view',['lead' => $lead]); 
    }
}
