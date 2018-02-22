<?php

namespace App\Http\Controllers;

use App\Task;
use App\Company;
use App\Project;
use App\TaskUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $tasks = Task::where('user_id', Auth::user()->id)->get();
            return view('tasks.index', ['tasks' => $tasks]);
        }
        return redirect::route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $project_id = null, $company_id = null)
    {
        $projects = null;
        $companies = null;
        if(!$company_id && !$project_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
            $projects = Project::where('user_id', Auth::user()->id)->get();
        }
        return view('tasks.create', ['company_id'=>$company_id, 'companies'=>$companies, 'project_id'=>$project_id, 'projects'=>$projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $newtask = Task::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'project_id' => $request->input('project_id'),
                'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);
            if ($newtask) {
                return redirect()->route('tasks.show', ['task' => $newtask->id])
                    ->with('success', 'Created Successfully');
            }
            return back()->withInput()->with('errors', 'Task not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task = Task::find($task->id);
        $comments = $task->comments;
        return view('tasks.show', ['task' => $task, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        //
    }
}
