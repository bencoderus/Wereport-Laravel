@extends('layouts.app')

@section('title')
Modify {{$msgs->title}} - {{ config('app.name') }}
@endsection

@section('content')

<h4 class='text-uppercase'>MODIFY: {{$msgs->title}}</h4><hr>
<br>
{{Form::open(['action'=>['MessageController@update', $msgs->id], 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}
<div class='form-group'>
{{Form::label('title', 'Subject: ')}}
{{Form::text('title', $msgs->title, ['placeholder'=>'Message', 'required'=>'required', 'minlength'=>'3', 'class'=>'form-control'])}}
</div>


<div class='form-group'>
    {{Form::label('body', 'Message: ')}}
    {{Form::textarea('body', $msgs->message
    , ['placeholder'=>'Message', 'required'=>'required', 'minlength'=>'5', 'class'=>'form-control'])}}
    </div>


    <div class='form-group'>
        {{Form::label('file', 'Attachment: ')}}
        {{Form::file('image')}}
        </div>

    {{Form::hidden('_method', 'PUT')}}
    <div class="form-group">
{{Form::submit('Send Message', ['class'=>'btn btn-primary'])}}
    </div>
{{Form::close()}}
@endsection
