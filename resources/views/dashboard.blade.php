@extends('layouts.app')

@section('title')
Dashboard - {{ config('app.name') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if(count($notify) > 0)
                <div class="shadow-sm p-3 mb-5 bg-white rounded"><i class='fa text-info fa-bell'></i> <a href='notifications' class='text-dark'>You have a new notification.</a></div>
@endif

            <div class="card">
                <div class="card-header bg-primary">My Messages</div>

                <div class="card-body">
                    @if(count($msgs) > 0)
                            @foreach($msgs as $msg)
                            <div class="pull-left"><a href="/message/{{$msg->id}}"><i class='fa fa-envelope'></i> {{$msg->title}}</a></div>
                            <div class="pull-right">{{$msg->created_at->diffForHumans()}}</div>
                            <br><hr>
                            @endforeach
                            {{$msgs->links()}}
                            @else
                    <p>NO MESSAGE HAS BEEN SENT BY YOU</p>
                    <p class='text-center'><a href="message/create"><button class="btn btn-success"><i class="fa fa-envelope"></i> SEND US A MESSAGE</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
