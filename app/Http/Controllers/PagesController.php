<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class PagesController extends Controller
{

 public function index()
 {
     //checking if user is logged in
     if(!Auth()->check())
     {
return view('welcome');
     }
     else
     {
return redirect('/dashboard');
     }
 }


 public function about()
 {
return view('about');
     }
public function contact()
     {
    return view('contact');
         }

    public function notification()
     {
    $notify=Notification::where('reciever', auth()->user()->id)->where('status', 0)->get();
    return view('notify')->with('notifys', $notify);
     }


    public function createmsg()
    {
        return view('message.create');
    }
}

