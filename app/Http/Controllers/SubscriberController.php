<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Inertia\Inertia;
class SubscriberController extends Controller
{
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

        $subscribers = Subscriber::query()
        ->when($search, function($query) use ($request){
            $query->where('name', 'like',"%{$request->input('search')}%")
                ->orWhere('email','like',"%{$request->input('search')}%")
                ->orWhere('phone','like',"%{$request->input('search')}%")
                ->orWhere('age','like',"%{$request->input('search')}%")
                ->orWhere('dob','like',"%{$request->input('search')}%")

                ;
                
        })
        ->when($package !== null, function($query) use ($request, $package){
            $query->where('interested_package','=',$package->name);
        })
        ->orderBy('renewal_date')
        ->get();
        $user = Auth::user()->id;

        return Inertia::render('Subscribers/Index',[
            'subscribers'=> $subscribers,
            'user'=> $user
            ]);
    }
}
