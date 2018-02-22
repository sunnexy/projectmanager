@extends('layouts.main')
@section('content')
    <section id="contact-page">
        <div class="col-md-6 col-lg-6 col-md-offset-3 col-md-offset-3">
            <div class="panel panel-primary" style="margin-top: 70px;">
                <div class="panel-heading" style="background-color: #444444; text-align: center;">Users</div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($users as $user)
                            <li class="list-group-item">
                                @if($user->id == Auth::user()->id)
                                    <a href="/pmanager/profile">{{ $user->name }}</a>
                                    @else
                                <a href="/pmanager/users/{{$user->id}}">{{ $user->name }}</a>
                                    @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection