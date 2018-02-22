@if(isset($errors)&&count($errors)>0)
    <div class="alert alert-dismissable alert-success ">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach($errors->all() as $error)
    <li><strong>{{ $error }}</strong></li>
            @endforeach
    </div>
@endif