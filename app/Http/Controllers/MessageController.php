<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Comment;
use App\Notification;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        if(auth()->user()->level < 3)
        {
            return redirect('/dashboard')->with('error', 'Restricted area!');
        }
        $msg=Message::all();
        return view('message.index')->with('msgs', $msg);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('message.create');
    }

    public function send()
    {
        return view('sendmessage');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


     $this->validate($request, [
         'title'=>'required',
         'body'=>'required',
         'image'=>'nullable|image|max:1999'
     ]);

if($request->hasFile('image'))
{
$file=$request->file('image')->getClientOriginalName();
$ext=$request->file('image')->getClientOriginalExtension();
$filename=pathinfo($file, PATHINFO_FILENAME);
$filenew='image'.time().'.'.$ext;
$path=$request->file('image')->storeAs('public/uploads', $filenew);
}
else
{
    $filenew="nophoto.jpg";
}
        $msg = new Message;
$msg->title=$request->input('title');
$msg->message=$request->input('body');
$msg->user_id=auth()->user()->id;
$msg->image=$filenew;
$msg->save();
return redirect ('/dashboard')->with('success', 'Message successfully sent!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id=auth()->user()->id;

        $notify=Notification::where('reciever', $user_id)->where('msgid', $id)->first();
       if(isset($notify) && $notify->status==0)
       {
        $notify->status=1;
        $notify->save();
       }
    $msgs=Message::findOrFail($id);
        $comment=Comment::where('msgid', $id)->get();
        $msg2=Message::find($id);
        if($msg2->status == 0 && auth()->user()->level==3)
        {
            $msg2->status=1;
            $msg2->save();
        }
        elseif(auth()->user()->level < 3 && $msg2->user_id != auth()->user()->id)
{
    return redirect('/dashboard')->with('error', 'You are not allowed to view other users messages!');
}

        return view('message.show', compact('msgs', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $msg=Message::find($id);
if(auth()->user()->id != $msg->user_id && auth()->user()->level < 3 ){
    return redirect('/dashboard')->with('error', 'You are not allowed to edit other users messages!');
}
    return view('message.edit')->with('msgs', $msg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'image'=>'nullable|image|max:1999'
        ]);
        $msg=Message::findOrFail($id);

   if($request->hasFile('image'))
   {
   $file=$request->file('image')->getClientOriginalName();
   $ext=$request->file('image')->getClientOriginalExtension();
   $filename=pathinfo($file, PATHINFO_FILENAME);
   $filenew='image'.time().'.'.$ext;
   $path=$request->file('image')->storeAs('public/uploads', $filenew);
   }
   else
   {
       $filenew=$msg->image;
   }
   $msg->title=$request->input('title');
   $msg->message=$request->input('body');
    $msg->image=$filenew;
   $msg->save();
   return redirect ('/message/'.$id)->with('success', 'Message successfully editted!');
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
        $msg=Message::find($id);
        $msg->delete();
        return redirect('/message')->with('success', 'Message deleted successfully');
    }
}
