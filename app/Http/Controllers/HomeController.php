<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $properties=Property::orderBy('created_at','desc')->where('sold',false)->limit(4)->get();
        // dd($properties->first()->created_at);
        $user=User::first();
        $user->password='0000';
        dd($user,$user->password);
        return view('home',['properties'=>$properties]);
    }
}
