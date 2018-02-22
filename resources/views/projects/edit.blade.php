@extends('layouts.main')
@section('content')
    <div class="row col-md-9 col-lg-9 col-sm-9" style="margin-top: 50px;">
        <div class="row col-md-12 col-lg-12 col-sm-12">
            <h2 style="text-align: center;">Edit {{$project->name}} details</h2>
            <form method="post" action="{{ route('projects.update',[$project->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="company-name">Name</label>
                    <input type="text" placeholder="Enter Company Name" name="name" class="form-control" value="{{ $project->name }}"/>
                </div>
                <div class="form-group">
                    <label for="company-name">Description</label>
                    <input type="text" placeholder="Description" name="description" class="form-control" value="{{ $project->description }}"/>
                </div>

                <div class="group">
                    <button type="submit" class="btn btn-primary" :disabled="any()">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 pull-right" style="margin-top: 20px;">
        <div class="sidebar-module">
            <h4>Manage</h4>
            <ol class="list-unstyled">
                <li><a href="/pmanager/companies/{{$project->id}}">Back</a></li>
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