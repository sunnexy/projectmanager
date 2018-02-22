@extends('layouts.main')
@section('content')
    <div class="row col-md-9 col-lg-9 col-sm-9" style="margin-top: 100px; display: -webkit-box; -webkit-box-orient: horizontal;">
        <div class="row col-md-12 col-lg-12 col-sm-12">
            <form action="{{route('myuploadurl')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div align="center" style="margin-right: 20px;">
                    <table>
                        <label >Select image to upload:</label>
                        <input type="file" name="image"/>
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}" />
                        <input type="submit" value="Upload"/>
                    </table>
                </div>
            </form>
            <div class="row col-md-9 col-lg-9 col-sm-9" style="margin-top: 10px;">
                <div class="row col-md-12 col-lg-12 col-sm-12">
                   @if(Auth::user()->image == '')
                        <img src="{{ asset('images/default.png') }}" width="300" height="200" />
                    @else
                        <img src="{{ asset(Auth::user()->image) }}" width="600" height="400" />
                    @endif
                </div>
            </div>
        </div>
        <div class="row col-md-12 col-lg-12 col-sm-12" style="margin-left: -180px; margin-top: 50px;">
            <h2 style="text-align: center; margin-left: -200px;">Edit Profile Details</h2>
            <form method="post" action="">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="company-name">Name</label>
                    <input type="text" placeholder="Enter Name" name="name"  value="<?php print(Auth::user()->name)?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="company-name">Password</label>
                    <input type="text" placeholder="Enter Password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="company-name">Joined</label>
                    <input type="text" value="<?php print(Auth::user()->created_at)?>" name="description" class="form-control" disabled/>
                </div>
                <input type="hidden" name="id" value="{{Auth::user()->id}}"/>
                <div class="group">
                    <button type="submit" class="btn btn-primary" :disabled="any()">Save & Update</button>
                </div>
            </form>
        </div>

    </div>

@endsection