@extends('layouts.main')
@section('content')
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="margin-top: 20px;">
        <div class="well well-lg">
            <h1 style="color: #4d4d4d;">{{$project->name}}</h1>
            <p class="lead">{{$project->description}}</p>
        </div>
<br/>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-comment"></span>
                            Recent comments
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul class="media-list">
                            @foreach($comments as $comment)
                                <li  class="media">
                                    <div class="media-left">

                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            {{$comment->user->name}}
                                            <br>
                                            <small>
                                                commented on <a href="#">{{$comment->created_at->diffForHumans()}}</a>
                                            </small>
                                        </h4>
                                        <p>{{$comment->body}}</p>
                                        <p class="text-danger">{{$comment->url}}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row container-fluid">
            <form method="post" action="{{ route('comments.store') }}">
                {{ csrf_field() }}
                <input type="hidden" name="commentable_type" value="App\Project">
                <input type="hidden" name="commentable_id" value="{{$project->id}}">
                <div class="form-group">
                    <label for="comment-content">Comment</label>
                    <textarea type="text" style="resize: vertical" id="comment-content" rows="3" placeholder="Add comment" name="body" class="form-control autosize-target text-left"></textarea>
                </div>
                <div class="form-group">
                    <label for="comment-content">Proof of work(url/photos)</label>
                    <textarea type="text" style="resize: vertical" id="comment-content" rows="2" placeholder="Enter URL/image" name="url" class="form-control autosize-target text-left"></textarea>
                </div>
                <div class="group">
                    <button type="submit" class="btn btn-primary" :disabled="any()">Submit</button>
                </div>
            </form>
        </div>
{{--        @foreach($project->comments as $comment)
        <div class="col-lg-4 col-md-4 col-sm-4">
            <h2>{{$comment->body}}</h2>
            <p class="text-danger">{{$comment->url}}</p>
        </div>
        @endforeach--}}

        <div style="text-align: right; font-size: 18px;">
            <a href="/pmanager/tasks/create/{{$project->company->id}}/{{$project->id}}">Add new Task</a>
        </div>
        <div class="row">
            @foreach($project->tasks as $task)
                <div class="col-lg-4">
                    <div class="media services-wrap wow fadeInDown">
                        <h3 class="media-heading">{{$task->name}}</h3>
                            <p>{{$task->description}}</p>
                        <p><a class="btn btn-primary" href="/pmanager/companies/{{$task->id}}">View Project</a></p>
                    </div>
                </div>
            @endforeach
        </div><!--/.row-->
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right" style="margin-top: 20px;">
        <div class="sidebar-module">
            <h4>Manage</h4>
            <ol class="list-unstyled">
                <li><a href="/pmanager/projects">Back</a></li>
                <li><a href="/pmanager/projects/{{$project->id}}/edit">Edit</a></li>

                @if($project->user_id == Auth::user()->id)
                <li><a href="#"
                    onclick="
                    var result= confirm('Are you sure you want to delete this project?');
                    if(result){
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }
                    ">Delete</a>
                    <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}" method="post">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    </form>
                </li>
                @endif

                <li><a href="/pmanager/projects/create">Add new Project</a></li>
            </ol>
            <br>
            <h3>Add Members</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form id="add-user" action="{{ route('projects.addUser')}}" method="post">
                        {{ csrf_field() }}

                        <div class="input-group">
                            <input class="form-control" type="hidden" value="{{$project->id}}" name="project_id">
                            <input type="text" class="form-control" placeholder="Add email" name="email">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Add!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <h4>Team Members</h4>
            <ol class="list-unstyled">
                @foreach($project->users as $user)
                <li><a href="#">{{$user->email}}</a></li>
                @endforeach
            </ol>
        </div>
    </div>
    @endsection