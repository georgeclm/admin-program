<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Package;

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

    public function index(Request $request)
    {
        $package = null;
        $search = false;
        if($request->has('package_search') && $request->input('package_search') != 0){
            $package = Package::findOrFail($request->input('package_search'));
        }
        if($request->has('search') && $request->input('search') !== ''){
            $search = true;
        }
        $leads = Lead::query()
            ->where('branch_id',1)
            ->where('active', 1)
            ->when($search, function($query) use ($request){
                $query->where('name', 'like',"%{$request->input('search')}%")
                    ->orWhere('email','like',"%{$request->input('search')}%");
            })
            ->when($package !== null, function($query) use ($request, $package){
                $query->where('interested_package','=',$package->name);
            })
            ->orderByDesc('id')
            ->paginate(10);
        return Inertia::render('Leads/Index',[
            'leads'=> $leads
        ]);
        }
    public function create()
    {
        $packages = Package::query()
        ->where('status','active')
        ->orderByDesc('id')
        ->get();
        return Inertia::render('Leads/LeadAdd',[
            'packages' =>$packages,
        ]);
    }
    public function store(Request $request)
    {
        $postData = $this->validate($request,$this->validations);
        $package = '';
        if($request->has('interested_package')){
            $package = $request->input('interested_package');
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
            'interested_package' => $package,
        ]);
        return redirect()-> route('lead.list');
    }
    public function view(Lead $lead)
    {
        // use this to load the relationship into the table as seen here the reminders relationship inside the View so can display
        $lead->load(['reminders']);
        // add on for packages add all the package inside the list and return the value 
        $packages = Package::query()
        ->where('status','active')
        ->orderByDesc('id')
        ->get();

        return Inertia::render('Leads/LeadView',[
            'lead-prop' => $lead,
            'packages' => $packages, 
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
