@extends('layouts.main')
@section('content')
    <div class="row col-md-9 col-lg-9 col-sm-9" style="margin-top: 50px;">
        <div class="row col-md-12 col-lg-12 col-sm-12">
            <h2 style="text-align: center;">Add New Company</h2>
            <form method="post" action="{{ route('companies.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="company-name">Name</label>
                    <input type="text" placeholder="Enter Company Name" name="name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="company-name">Description</label>
                    <input type="text" placeholder="Description" name="description" class="form-control"/>
                </div>

                <div class="group">
                    <button type="submit" class="btn btn-primary" :disabled="any()">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection