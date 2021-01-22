<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class LeadController extends Controller
{
    // create private property for the validations 
    private $validations;
    // take the validations inside the constructor
    public function __construct()
    {
        $this->validations = [
            'name'=> 'required',
            'email'=> 'required|email',
            'dob'=> 'required|date',
            'phone'=> 'required',
            'interested_package' => 'sometimes',
        ];
    }

    public function index()
    {
        $leads = Lead::query()
            ->where('branch_id',1)
            ->orderByDesc('id')
            ->get();
        return Inertia::render('Leads/index',[
            'leads'=> $leads
        ]);
        }
    public function create()
    {
        return Inertia::render('Leads/LeadAdd');
    }
    public function store(Request $request)
    {
        $postData = $this->validate($request,$this->validations);
        $interested_package = '';
        if($request->has('interested_package')){
            $interested_package = $request->input('interested_package');
        }

        $dob = Carbon::parse($postData['dob']);
        $age = $dob->age;
        Lead::create([
            'name'=>$postData['name'],
            'email'=>$postData['email'],
            'dob'=>$dob,
            'phone'=>$postData['phone'],
            'branch_id'=>1,
            'age'=>$age,
            'added_by'=> Auth::user()->id,
            'interested_package' => $interested_package,
        ]);
        return redirect()-> route('lead.list');
    }
    public function view(Lead $lead)
    {
        // use this to load the relationship into the table as seen here the reminders relationship inside the View so can display
        $lead->load(['reminders']);

        return Inertia::render('Leads/LeadView',[
            'lead-prop' => $lead
        ]); 
    }
    public function update(Request $request)
    {
        $rules = $this->validations;
        // use this to modify or add inside the database in this one add id
        $rules['id'] = 'required|exists:leads';
        $postData = $this->validate($request,$rules);
        // in this one modify age on update
        $postData['age']= Carbon::parse($postData['dob'])->age;
        $lead = Lead::where('id', $postData['id'])
        ->update($postData);
        return redirect()
        ->route('lead.view', $postData['id'])
        ->with('success','Your changes are saved now');

    }
}
