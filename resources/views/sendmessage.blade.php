@extends('layouts.app')
@section('title')
Send us a message  - {{ config('app.name') }}
@endsection

@section('content')

<h4>SEND US A MESSAGE</h4><hr>
<br>
{{Form::open(['action'=>'MessageController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}
<div class='form-group'>
{{Form::label('title', 'Subject: ')}}
{{Form::text('title', '', ['placeholder'=>'Message', 'required'=>'required', 'minlength'=>'3', 'class'=>'form-control'])}}
</div>


<div class='form-group'>
    {{Form::label('body', 'Message: ')}}
    {{Form::textarea('body', '', ['placeholder'=>'Message', 'required'=>'required', 'minlength'=>'5', 'class'=>'form-control'])}}
    </div>


    <div class='form-group'>
        {{Form::label('file', 'Attachment: ')}}
        {{Form::file('image')}}
        </div>

    <div class="form-group text-center">
        {{Form::button('<i class="fa fa-envelope"></i> Send Comment', ['class'=>'btn btn-primary', 'required'=>'required', 'type'=>'submit'])}}
    </div>
{{Form::close()}}
@endsection
