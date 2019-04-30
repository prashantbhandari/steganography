@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
<h1>Encode your message here </h1>
<p> You can make your secret message hide within an image over here </p>
  
<form method="post" action="/encryptImage">
{{csrf_field()}}
    <div class="form-group">
      <label for="comment">Message</label>
      <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
    </div>
    <center><p><button class="btn btn-primary btn-lg">Encode</button></p></center>
</form>
</div>
@endsection
