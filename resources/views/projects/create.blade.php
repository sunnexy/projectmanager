@extends('layouts.main')
@section('content')
    <div class="row col-md-9 col-lg-9 col-sm-9" style="margin-top: 50px;">
        <div class="row col-md-12 col-lg-12 col-sm-12">
            <h2 style="text-align: center;">Add New Project</h2>
            <form method="post" action="{{ route('projects.store') }}">
                {{ csrf_field() }}
                @if($companies !=null)
                <div class="form-group">
                    <label for="company-name">Select Company</label>
                    <select name="company_id" class="form-control">
                        @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="form-group">
                    <label for="company-name">Name</label>
                    <input type="text" placeholder="Enter Project Name" name="name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="company-name">Description</label>
                    <input type="text" placeholder="Description" name="description" class="form-control"/>
                </div>
                @if($companies == null)
                <div class="form-group">
                <input type="hidden" name="company_id" value="{{ $company_id }}"/>
                </div>
                @endif
                <div class="group">
                    <button type="submit" class="btn btn-primary" :disabled="any()">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection