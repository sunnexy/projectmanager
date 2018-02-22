@extends('layouts.main')
@section('content')
    <section id="contact-page">
        <div class="col-md-6 col-lg-6 col-md-offset-3 col-md-offset-3">
            <div class="panel panel-primary" style="margin-top: 70px;">
                <div class="panel-heading" style="background-color: #444444;">Tasks  <a class="pull-right btn btn-primary btn-sm" style="margin-top: -2px; background-color: #0a0a0a;" href="/pmanager/tasks/create">Add Task</a></div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($tasks as $task)
                            <li class="list-group-item"> <a href="/pmanager/tasks/{{$task->id}}">{{ $task->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection