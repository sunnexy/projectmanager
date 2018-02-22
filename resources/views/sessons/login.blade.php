@extends('layouts.main');
<br>
<body class="homepage">
<div style=" text-align: center;">
    <div style="float: none; margin-right: 280px; margin-top: 200px; margin-left: 280px; background-color: whitesmoke;">
<form action="/pmanager/login" enctype="multipart/form-data" method="POST" style="margin-bottom: 70px;">
    {{ csrf_field() }}
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


        <br>
        <br>

        <div class="group">
            <button type="submit" class="btn btn-primary" >Login</button>
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
            <label>Not yet a member?</label>
            <a href="/pmanager" class="btn btn-primary">Sign up</a>
        </div>
</form>
</div>
</div>
</body>