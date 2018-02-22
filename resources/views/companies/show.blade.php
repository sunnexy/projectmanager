@extends('layouts.main')
@section('content')
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <div class="jumbotron">
            <h1>{{$company->name}}</h1>
            <p class="lead">{{$company->description}}</p>
        </div>
        <div style="text-align: right; font-size: 18px;">
            <a href="/pmanager/projects/create/{{$company->id}}">Add new Project</a>
        </div>
        <div class="row">
            @foreach($company->projects as $project)
                <div class="col-lg-4">
                    <div class="media services-wrap wow fadeInDown">
                        <h3 class="media-heading">{{$project->name}}</h3>
                            <p>{{$project->description}}</p>
                        <p><a class="btn btn-primary" href="/pmanager/projects/{{$project->id}}">View Project</a></p>
                    </div>
                </div>
            @endforeach
        </div><!--/.row-->
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right" style="margin-top: 20px;">
        <div class="sidebar-module">
            <h4>Manage</h4>
            <ol class="list-unstyled">
                <li><a href="/pmanager/companies">Back</a></li>
                <li><a href="/pmanager/companies/{{$company->id}}/edit">Edit</a></li>
                <li><a href="#"
                    onclick="
                    var result= confirm('Are you sure you want to delete this company?');
                    if(result){
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }
                    ">Delete</a>
                    <form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}" method="post">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    </form>
                </li>
                <li><a href="/pmanager/projects/create/{{$company->id}}">Add new Project</a></li>
                <li><a href="#">Add new member</a></li>
            </ol>
            <p></p>
            <div class="sidebar-module">
                <h4>Members</h4>
                <ol class="list-unstyled">
                    <li></li>
                </ol>
            </div>
        </div>
    </div>
    @endsection