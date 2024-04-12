<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        // User::create([
        //     'name'=>'Hardy ADIMOU',
        //     'email'=>'hardyadimou2005@gmail.com',
        //     'password'=>Hash::make('000000')
        // ]);
        return view('auth.login');
    }
    public function doLogin(LoginRequest $request)
    {
        if(Auth::attempt($request->validated()))
        {
            $request->session()->regenerate();
            return  redirect()->intended(route('admin.property.index'));
        } 
        return back()->withErrors([
                'email' => 'données incorrectes'
            ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success','Vous êtes déconnecté !');
    }
}
