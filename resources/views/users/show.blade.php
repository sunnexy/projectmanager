@extends('layouts.main')
@section('content')
    <div class="row col-md-9 col-lg-9 col-sm-9" style="margin-top: 100px; display: -webkit-box; -webkit-box-orient: horizontal;">
        <div class="row col-md-12 col-lg-12 col-sm-12">
            <div class="row col-md-9 col-lg-9 col-sm-9" style="margin-top: 10px;">
                <div class="row col-md-12 col-lg-12 col-sm-12">
                    @if(Auth::user()->image == '')
                        <img src="{{ asset('images/default.png') }}" width="300" height="200" />
                    @else
                    <img src="{{ asset($user->image) }}" width="600" height="400" />
                        @endif
                </div>
            </div>
        </div>
        <div class="row col-md-12 col-lg-12 col-sm-12" style="margin-left: -180px; margin-top: 50px;">
            <h2 style="text-align: center; margin-left: -200px;">View {{$user->name }} Details</h2>
            <form method="post" action="">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="company-name">Name</label>
                    <input type="text" placeholder="Enter Name" name="name"  value="<?php print($user->name)?>" class="form-control" disabled/>
                </div>
                <div class="form-group">
                    <label for="company-name">Email</label>
                    <input type="text" placeholder="Enter Password" value="<?php print($user->email)?>" name="password" class="form-control" disabled/>
                </div>
                <div class="form-group">
                    <label for="company-name">Joined</label>
                    <input type="text" value="<?php print($user->created_at)?>" name="description" class="form-control" disabled/>
                </div>
                <input type="hidden" name="id" value="{{$user->id}}"/>
                <div class="group">
                    <button type="submit" class="btn btn-primary" :disabled="any()">Save & Update</button>
                </div>
            </form>
        </div>
    </div>
    <section id="contact-page">
        <div class="col-md-6 col-lg-6 col-md-offset-3 col-md-offset-3">
            <div class="panel panel-primary" style="margin-top: 70px;">
                <div class="panel-heading" style="background-color: #444444;">{{$user->name}} Companies </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($user->companies as $company)
                                <li class="list-group-item"> <a href="/pmanager/companies/{{$company->id}}">{{ $company->name }}</a></li>
                             @endforeach
                        </ul>
                    </div>
            </div>
        </div>
    </section>
@endsection