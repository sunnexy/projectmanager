@extends('layouts.main')
@section('content')
    <section id="contact-page">
        <div class="col-md-6 col-lg-6 col-md-offset-3 col-md-offset-3">
    <div class="panel panel-primary" style="margin-top: 70px;">
        <div class="panel-heading" style="background-color: #444444;">Projects  <a class="pull-right btn btn-primary btn-sm" style="margin-top: -2px; background-color: #0a0a0a;" href="/pmanager/projects/create">Add Project</a></div>
            <div class="panel-body">
                <ul class="list-group">
            @foreach($projects as $project)
                        <li class="list-group-item"> <a href="/pmanager/projects/{{$project->id}}">{{ $project->name }}</a></li>
                @endforeach
                </ul>
            </div>
    </div>
        </div>
    </section>
    @endsection
