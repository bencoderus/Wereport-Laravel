@extends('layouts.app')

@section('content')

<h5>Hello {{Auth::user()->name}}, welcome to your account manager! </h5><hr>
<p class='text-center'>Ensure the quality of the image is good enough</p>

{{Form::open(['action'=>'UserController@storephoto', 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}
<div class="form-group text-center">
{{Form::label('image', 'Choose Photo: ')}}
{{Form::file('image')}}
</div>
<div class="text-center">
{{Form::submit('Add New Photo', ['class'=>'btn btn-success'])}}
</div>
{{Form::close()}}
@endsection
