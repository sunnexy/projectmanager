@extends('layouts.main')
@section('content')
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="margin-top: 30px;">
        <div class="well well-lg">
            <h1 style="color: #4d4d4d;">{{$task->name}}</h1>
            <p class="lead">{{$task->description}}</p>
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
                <input type="hidden" name="commentable_type" value="App\Task">
                <input type="hidden" name="commentable_id" value="{{$task->id}}">
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
    </div>
    @endsection