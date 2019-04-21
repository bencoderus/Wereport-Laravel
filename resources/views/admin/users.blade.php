@extends('layouts.app')

@section('content')

@section('title')
Users - Admin
@endsection

<div class="card">
    <div class="card-header bg-primary">
All users
    </div>
    <div class="card-body">
            @if(count($users) > 0)
        @foreach($users as $user)
    <div class="pull-left">{{$user->name}}</div> <div class="pull-right"><a href='/user/{{$user->id}}' class='btn btn-sm btn-primary'>View Profile</a></div><br><hr>


@endforeach

@else

<h4>NO USERS YET</h4>
@endif
</div>
</div>
@endsection
