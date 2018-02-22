@extends('layouts.main')
@section('content')
    <section id="contact-page">
        <div class="col-md-6 col-lg-6 col-md-offset-3 col-md-offset-3">
            <div class="panel panel-primary" style="margin-top: 70px;">
                <div class="panel-heading" style="background-color: #444444; text-align: center;">Companies</div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($companies as $company)
                            <li class="list-group-item">
                                    <a href="/pmanager/company/{{$company->id}}">{{ $company->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection