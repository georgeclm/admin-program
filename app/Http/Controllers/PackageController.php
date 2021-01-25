<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Package;
class PackageController extends Controller
{
    protected $rules;
    // validation rules
    public function __construct(){
        $this->rules =[
            'name' => 'required',
            'amount' => 'required|numeric|min:1',
            'number_of_days' => 'required|min:1',

        ];
    }
    // to take the data and display 
    public function index()
    {
        $packages = Package::query()
        ->where('status','active')
        ->orderBy('number_of_days','asc')
        ->get();
        return Inertia::render('Packages/Index',[
            'activePackages' => $packages
        ]);
    }
    public function store(Request $request)
    {
        $postData = $this->validate($request, $this->rules);
        // send the active package
        $postData['status'] = 'active';
        Package::create($postData);
        return redirect()->route('package.list');
    }
    public function view(Package $package)
    {
        return Inertia::render('Packages/PackageView',[
            'package' => $package
        ]);
    }
    public function update(Request $request)
    {
        $rules = $this->rules;
        $rules['id'] = 'required|exists:packages,id';
        $postData = $this->validate($request, $rules);
        $package = Package::find($postData['id']);
        $package->name = $postData['name'];
        $package->amount = $postData['amount'];
        $package->number_of_days = $postData['number_of_days'];
        $package->save();
        return redirect()
            ->route('package.list');

    }
}
