<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Notification;

class DbController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $uid=auth()->user()->id;
        $msgs=Message::where('user_id', $uid)->paginate(7);
        $notify=Notification::where('reciever', $uid)->where('status', 0)->get();
        return view('dashboard', compact('msgs', 'notify'));
    }
}
