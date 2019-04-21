<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Notification;
use App\Message;

class CommentController extends Controller
{
    public function __construct()
    {
$this->middleware('auth');
    }

    public function store(Request $request)
{
    $this->validate($request, [
        'comment'=>'required|min:3'
    ]);
    $comment= new Comment;
        $comment->msgid=$request->input('id');
        $comment->user=auth()->user()->name;

        $comment->message=$request->input('comment');
        $id=$request->input('id');
        $comment->save();
        //fetching user id from message
        $msgid = $request->input('id');
        $msg=Message::findOrFail($msgid);
        $user_id=$msg->user_id;
        if ($user_id != auth()->user()->id)
        {
        $notify=new Notification;
        $notify->message=auth()->user()->name ." just replied your message";
        $notify->msgid=$msgid;
        $notify->reciever=$user_id;
        $notify->save();
        }
        return redirect('/message/'.$id)->with('success', 'Comment successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request)
{
    $id=$request->input('id');
    $msgid=$request->input('msgid');
    $comment=Comment::findOrFail($id);
    $comment->delete();
    return redirect('/message/' .$msgid)->with('success', 'Comment successfully deleted');
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment=Comment::findOrFail($id);
        return view('message.editcomment')->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,
        [
            'comment'=>'required',
            'id'=>'required',
            'msgid'=>'required'
        ]);

    $id=$request->input('id');
    $msgid=$request->input('msgid');
    $comment=Comment::findOrFail($id);
    $comment->message=$request->input('comment');
    $comment->save();
    return redirect('/message/' .$msgid)->with('success', 'Comment successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
