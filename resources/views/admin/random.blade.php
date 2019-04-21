@extends('layouts.app')

@section('title')
Random messages - Admin
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-primary">Unread Messages

    </div>
    <div class="card-body">

@if(count($msgs) > 0)

@foreach($msgs as $msg)
<a href='/message/{{$msg->id}}'><h6 class='mb-1'><i class='fa fa-envelope'></i> {{$msg->title}}</h6></a> - {{$msg->user->name}}
<hr>
@endforeach

{{$msgs->links()}}

@else

    <h4 class='text-center'>NO NEW MESSAGE HAS BEEN RECIEVED YET</h4>


@endif

{{$msgs->links()}}
</div>
</div>
@endsection
