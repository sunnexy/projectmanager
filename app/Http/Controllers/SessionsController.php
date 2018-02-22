<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{/*
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }*/

    public function login(){
        return view('sessons.login');
    }
    public function store(){
        if(! auth()->attempt(request(['email', 'password']))){
            return back()->withErrors([
                'errors' => 'Please check your details and try again!'
            ]);
        }
        return redirect()->home();
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
