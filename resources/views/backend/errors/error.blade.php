@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has($msg))
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                </div>
            </div>
        </div>
    @endif
@endforeach

@if( count($errors) > 0 )
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endforeach
            </div>
        </div>
    </div>
@endif