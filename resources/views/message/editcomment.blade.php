@extends('layouts.app')



@section('content')
{{Form::open(['action'=>'CommentController@update', 'method'=>'POST'])}}
<center>
{{Form::label('Comment', 'Modify Comment: ')}}
</center>
<div class="form-group">
{{Form::textarea('comment', $comment->message, ['class'=>'form-control', 'rows'=>'5'])}}
</div>
<center>

{{Form::hidden('msgid', $comment->msgid)}}
{{Form::hidden('id', $comment->id)}}
{{Form::button('<i class="fa fa-envelope"></i> Update changes!', ['class'=>'btn btn-primary', 'required'=>'required', 'type'=>'submit'])}}
</center>
{{Form::close()}}
@endsection
