@extends('layouts.app')

@section('content')

<p>Hello {{Auth::user()->name}}, welcome to your account manager! </p>
<p>Change Profile Photo</p>
{{Form::open(['action'=>'UserController@addphoto', 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}

{{Form::label('image', 'Choose Photo: ')}}
{{Form::file('image')}}
{{Form::close()}}
@endsection
