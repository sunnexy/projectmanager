@include('layouts.header');
<body class="homepage">
@if(!Auth::check())
    @include('layouts.nav');
@else
    @include('layouts.navi')
    @endif
<div class="container" style="margin-top: 50px;">
    @include('partials.errors')
    @include('partials.success')
    <div class="row" style="margin-bottom: 400px;">
        @yield('content')
    </div>
</div>

@include('layouts.footer');
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset('js/jquery.isotope.min.js')}}"></script>
<script src="{{ asset('js/wow.min.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>

</body>
</html>