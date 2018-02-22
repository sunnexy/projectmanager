<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class RegistrationController extends Controller
{
    public function create(){
        return view('welcome');
    }
    public function store(){
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        auth()->login($user);
        return redirect()->home();
    }
}
