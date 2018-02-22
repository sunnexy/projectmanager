<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\User;
use App\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $projects = Project::where('user_id', Auth::user()->id)->get();
            return view('projects.index', ['projects'=>$projects]);
        }
        return redirect::route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $company_id=null)
    {
        $companies = null;
        if(!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }

        return view('projects.create', ['company_id'=>$company_id, 'companies'=>$companies]);
    }
    public function addUser(Request $request){
        //add users to a project
        $project = Project::find($request->input('project_id'));
        if(Auth::user()->id == $project->user_id){
            $user = User::where('email', $request->input('email'))->first();
            //check if user already exist
            $projectUser = ProjectUser::where('user_id', $user->id)
                ->where('project_id', $project->id)
                ->first();
            if($projectUser){
                return redirect()->route('projects.show', ['project'=>$project->id])
                    ->with('success', $request->input('email').' already a member!');
            }
            if($user && $project){
                $project->users()->attach($user->id);
                return redirect()->route('projects.show', ['project'=>$project->id])
                    ->with('success', $request->input('email').' added successfully!');
            }
        }
        return redirect()->route('projects.show', ['project'=>$project->id])
            ->with('errors', 'User not added');

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
            $newproject = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);
            if ($newproject) {
                return redirect()->route('projects.show', ['project' => $newproject->id])
                    ->with('success', 'Created Successfully');
            }
            return back()->withInput()->with('errors', 'Company not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Company $company)
    {
        //$company = Company::where('id', $company->id)->first();

        $project = Project::find($project->id);
        $company = $project->with('companies');
        $comments = $project->comments;
        return view('projects.show', ['project' => $project, 'comments'=>$comments, 'company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        $project = Project::find($project->id);
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $projectupdate = Project::find($project->id)
            ->update([
                'name'=>$request->input('name'),
                'description'=>$request->input('description')
            ]);
        if($projectupdate){
            return redirect()->route('projects.show', ['project'=>$project->id])
                ->with('success', 'Updated Successfully');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $project = Project::find($project->id);
        if($project->delete()){
            return redirect()->route('projects.index')
                ->with('success', 'Deleted successfully');
        }
        return back()->withInput()->with('error', 'Project could not be deleted');
    }
}
