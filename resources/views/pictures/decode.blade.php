@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
  <form>
    <div class="form-group">
      <label for="comment"><h3>Your Secret message is: </h3></label>
      <p>{{$real_message}}</p>
    </div>
  </form>
</div>
<a href="/upload" class="btn btn-default">GO back</a>
@endsection
