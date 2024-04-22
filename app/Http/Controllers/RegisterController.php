<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'traffic_id' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);
        
        User::create([
            'name'=> $request->name,
            'traffic_id'=> $request->traffic_id,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('dashboard');
    }
}
