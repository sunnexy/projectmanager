<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Project;
use App\Task;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function companies(){
        if(Auth::check()) {
            $companies = Company::all();
            return view('companies.index', ['companies' => $companies]);
        }
        return view('sessons.login');
    }
    public function projects(){
        if(Auth::check()) {
            $projects = Project::all();
            return view('projects.index', ['projects' => $projects]);
        }
        return view('sessons.login');
    }
    public function tasks(){
        if(Auth::check()){
            $tasks = Task::all();
            return view('tasks.index', compact('tasks'));
        }
    }
}
