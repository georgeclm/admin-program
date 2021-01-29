<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Subscriber;

use Inertia\Inertia;
use App\Models\Package;

class LeadSubscriberController extends Controller
{
    public function view(Lead $lead)
    {
        $packages = Package::query()
        ->where('status','active')
        ->orderByDesc('id')
        ->get();
        return Inertia::render('Subscribers/SubscriberAdd',[
            'lead'=> $lead,
            'packages'=>$packages
        ]);
    }
    public function store(Request $request)
    {

        $postData = $this->validate($request,[
            'name' => 'required',
            'package_id' => 'required|exists:packages,id',
            'lead_id'=>  'required|exists:leads,id',
            'renewal_date' => 'required|date|date_format:"Y-m-d"',
            'amount' => 'required',
        ]);
        // to take the package from the postdata
        // this is for the suscriber befcause it used 2 foreign key in the data use the search package and lead id and set it to 1 table
        // this both is needed for the value and renewal date need to be taken from the database not from the vue data
        $package = Package::find($postData['package_id']);
        $lead = Lead::find($postData['lead_id']);
        Subscriber::create([
            'lead_id' =>$postData['lead_id'],
            'package_id' => $package->id,
            'renewal_date' => now()->addDays($package->number_of_days)->format("Y-m-d"),     
            'amount' =>$package->amount,
            'name' =>$lead['name'],
            'email' =>$lead['email'] ,
            'phone' =>$lead['phone'] ,
            'age' =>$lead['age'],
            'dob' =>$lead['dob'],
            'branch_id' =>$lead['branch_id'] ,
            'added_by' =>$lead['added_by'],
            'interested_package' =>$package->name
        ]);
        // after input all the data inside the database change the lead to not active so it wont show
            $lead->active = 0;
            $lead->save();
            return redirect()->route('lead.list');


    }
}
