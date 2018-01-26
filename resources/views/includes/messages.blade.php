@if(count($errors))
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('error'))
    <div class="alert alert-danger autohide"><strong> 
        {{session('error')}}
    </strong></div>
@endif

@if(session('success'))
    <div class="alert alert-success autohide"><strong> 
        {{session('success')}}
    </strong></div>
@endif
