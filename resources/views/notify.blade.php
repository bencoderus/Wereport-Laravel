@extends('layouts.app')

@section('content')

@section('title')
Notifications - {{config('app.name')}}
@endsection

<div class="card">
    <div class="card-header bg-primary">
All Notification
    </div>
    <div class="card-body">
            @if(count($notifys) > 0)
        @foreach($notifys as $notify)
    <div class="pull-left">{{$notify->message}}</div> <div class="pull-right">{{$notify->created_at->diffForHumans()}} - <a href='/message/{{$notify->msgid}}' class='btn btn-sm btn-primary'>View Message</a></div><br><hr>


@endforeach

@else

<h4>NO NEW NOTIFICATION YET</h4>
@endif
</div>
</div>
@endsection
