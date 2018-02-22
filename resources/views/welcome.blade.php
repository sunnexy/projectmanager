@include('layouts.header');
<body class="homepage">
@include('layouts.nav');
<div class="bg1" style="background: url('images/slider.jpg');background-size:1700px; margin-top: 50px;">
    <br>
    <br>
    <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-4 panel">
            <!-- sign in form begins -->
            <form class="form-horizontal" action="/pmanager/register" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
                <fieldset>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label"></label>
                        <div class="col-md-12">
                            <input name="name" id="name" placeholder="Enter your full name" class="form-control input-md" type="text" >
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label"></label>
                        <div class="col-md-12">
                            <input name="email" id="email" placeholder="Enter your email" class="form-control input-md" type="email" >
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label"></label>
                        <div class="col-md-12">
                            <input name="password" id="password" placeholder="password" class="form-control input-md" type="password">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label"></label>
                        <div class="col-md-12">
                            <input name="password_confirmation" id="password_confirmation" placeholder="confirm password" type="password" class="form-control input-md" data-type="password">
                        </div>
                    </div>


                    <br>
                    <br>


                    <!--    <div class="form-group">
                            <label class="col-md-12control-label"></label>
                            <div class="col-md-12">
                                <input name="passport" class="form-control input-md" type="file">
                            </div>
                        </div>-->

                    <div class="group">
                        <button type="submit" class="btn btn-primary" :disabled="any()">Sign Up</button>
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label>Already Member?</label>
                        <a href="/pmanager/login" class="btn btn-primary">Login</a>
                    </div>

                </fieldset>
            </form>
        </div><!--col-md-6 end-->

    </div>
</div>


@include('layouts.footer');

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
