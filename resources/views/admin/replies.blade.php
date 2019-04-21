@extends('layouts.app')

@section('title')
Replies - Admin
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-primary">
Latest Replies
    </div>
    <div class="card-body">
            @if(count($comments) > 0)
        @foreach($comments as $com)
    <div class="pull-left">{{$com->message}}</div> <div class="pull-right"><a href='/message/{{$com->msgid}}' class='btn btn-sm btn-primary'>View Thread</a></div><br><hr>


@endforeach

@else

<h4>NO COMMENT YET HAS BEEN ADDED TO ANY THREAD YET</h4>
@endif
</div>
</div>
@endsection
