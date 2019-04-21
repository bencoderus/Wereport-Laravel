@extends('layouts.app')

@section('title')
Messages - Admin
@endsection
@section('content')
<div class="card">
    <div class="card-header bg-primary">Unread Messages

    </div>
    <div class="card-body">

@if(count($msgs) > 0)

@foreach($msgs as $msg)
<a href='/message/{{$msg->id}}'><h6 class='mb-1'><i class='fa fa-envelope'></i><b> {{$msg->title}}</b></h6></a> - {{$msg->user->name}}
<hr>
@endforeach

{{$msgs->links()}}
@else

    <h4 class='text-center'>NO NEW MESSAGE HAS BEEN RECIEVED YET</h4>


@endif
</div>
</div>
@endsection
