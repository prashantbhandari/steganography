@extends ('layouts.app')


@section('content')
    <div class="jumbotron text-center">
    <h1>Your Image :</h1>
    <img src="/storage/{{ Auth::user()->name }}.png" width="50%">

    <p><a class="btn btn-primary btn-lg" href="/encode" role="button">Encode</a>
    <a class="btn btn-primary btn-lg" href="/decode" role="button">Decode</a></p>
    
@endsection