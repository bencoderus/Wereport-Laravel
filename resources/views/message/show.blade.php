@extends('layouts.app')

@section('title')
{{$msgs->title}} - {{ config('app.name') }}
@endsection

@section('content')
<h4 class="text-uppercase">    {{$msgs->title}}</h4>

Sent: {{$msgs->created_at->diffForHumans() }}<BR>
Message by: <b>{{$msgs->user->name}}</b>
<br>
Status:
@if($msgs->status >= 1)
Seen
@else
Unread
@endif
<hr><br>
<center><img src='/storage/uploads/{{$msgs->image}}' style='width: 70%;' class=' img-thumbnail' align='center'></center><br>

<p class='text-justify'>
    {{ucfirst($msgs->message)}}
</p>
<br>
<br>
@if(Auth::user()->name == $msgs->user->name || Auth::user()->level >=3)

<a href='/message/{{$msgs->id}}/edit'><button class="btn-sm btn btn-primary"><i class='fa fa-edit'></i> Edit</button></a>
{{Form::open(['action'=>['MessageController@destroy', $msgs->id], 'class'=>'pull-right', 'method'=>'POST'] )}}
{{Form::hidden('_method', 'DELETE')}}
{{Form::button('<i class="fa fa-trash"></i> Delete', ['type'=>'submit','class'=>'btn btn-sm btn-danger'] )}}
{{Form::close()}}
@endif
<br>
<br>
@if(count($comment) > 0)
<br><h5><i class='fa fa-comments-o'></i>
    @if(count($comment) > 1)
    {{count($comment)}} REPLIES
    @else
    {{count($comment)}} REPLY
    @endif
</h5><br>
@foreach($comment as $comment)
<div class="card">
<div class="card-header font-weight-bold"><span class="pull-left">{{$comment->user}}</span><span class="pull-right">{{$comment->created_at->diffForHumans()}}</span></div>
<div class="card-body">
    {{ucfirst($comment->message)}}
    <br><br>
@if(Auth::user()->name == $comment->user || Auth::user()->level >=3)
    {{Form::open(['action'=>'CommentController@delete', 'class'=>'pull-left', 'method'=>'POST'])}}
{{Form::hidden('id', $comment->id)}}
{{Form::hidden('msgid', $msgs->id )}}
{{Form::button('<i class="fa fa-trash"></i> Delete', ['type'=>'submit','class'=>'btn btn-sm btn-danger'] )}}

{{Form::close()}}

<a href="/comment/edit/{{$comment->id}}" class="pull-right btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit</a>
@endif
</div>

</div>

<br>
@endforeach
@else
<br>
@endif
@auth
<h5>LEAVE A COMMENT</h5>
{{Form::open(['action'=>'CommentController@store', 'method'=>'POST'])}}
<div class="form-group">
{{Form::textarea('comment', '', ['class'=>'form-control', 'placeholder'=>'Type Your Comment Here', 'rows'=>'5'])}}
</div>
<center>

        {{Form::hidden('id', $msgs->id)}}
{{Form::button('<i class="fa fa-envelope"></i> Send Comment', ['class'=>'btn btn-primary', 'required'=>'required', 'type'=>'submit'])}}
</center>
{{Form::close()}}
@endauth

@endsection
