<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Comment;

class AdminController extends Controller
{
 public function __construct()
 {
$this->middleware('auth');
$this->middleware('admin');
 }
    //messages
public function messages()
{
    $msg=Message::paginate(5);
    return view('admin.msgs')->with('msgs', $msg);
}

public function random()
{
    $msg=Message::inRandomOrder()->distinct()->paginate(1);
    return view('admin.msgs')->with('msgs', $msg);
}

//users
public function users()
{
    $users=User::all();
    return view('admin.users')->with('users', $users);
}

//unread msgs
public function unread()
{
    $msgs=Message::where('status', 0)->get();
    return view('admin.unread')->with('msgs', $msgs);
}



public function replies()
{
    $comments=Comment::orderBy('created_at', 'DESC')->get();
    return view('admin.replies')->with('comments', $comments);
}

    public function index()
    {
        return view('admin.dashboard');
    }
}
