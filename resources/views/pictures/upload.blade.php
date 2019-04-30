@extends ('layouts.app')

@section('content')
    <div class="col-lg-offset-4 col-lg-4">

    <center><h1>Upload Picture here:</h1></center>
    <form action="/store" enctype="multipart/form-data" method="post">
    {{csrf_field()}}
        <input type="file" name="image">
        <br>
        <input type="submit" value="upload">
    </form>
    </div>
    
@endsection