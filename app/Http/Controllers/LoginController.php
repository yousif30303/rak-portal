<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        

        if(!auth()->attempt($request->only('email','password')))
        {
            return back()->with('status', 'Invalid login details!');
        }

        return redirect()->route("schedule");
    }
}
