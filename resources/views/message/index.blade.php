@extends('layouts.app')

@section('title')
Messages - {{ config('app.name') }}
@endsection
@section('content')

@if(count($msgs) > 0)
<ul class='list-group'>
<li class='list-group-item'><h6 class='mb-1'>All Messages</h6></li>

@foreach($msgs as $msg)
<li class='list-group-item d-flex justify-content-between align-items-center'><a href='message/{{$msg->id}}'><h6 class='mb-1'><i class='fa fa-envelope'></i> {{$msg->title}}</h6></a> - {{$msg->user->name}} </li>
@endforeach

</ul>

@endif

@endsection
