@extends ('layouts.app')

@section('content')
    <div class="jumbotron text-center">
    <h1>Your Encoded Image :</h1>
    <img src="/storage/{{ Auth::user()->name }}.png" width="50%">
    <br>
    <hr>
    <br>
    <a href="/storage/{{ Auth::user()->name }}.png" download><button type="button" class="btn btn-success">Download</button></a>
    <a href="/upload" class="btn btn-default">GO back</a>
    </div>
@endsection