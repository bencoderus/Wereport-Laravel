<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
$this->middleware('auth');
    }
    //
    public function profile($id)
    {
        $user=User::findOrFail($id);
        return view('profile')->with('user', $user);
    }

public function addphoto()
{
    return view('account.changephoto');
}

public function storephoto(Request $request)
{
$this->validate($request,
 [
     'image'=>'image|required|max:1999'
 ]);
    $file=$request->file('image')->getClientOriginalName();
    $ext=$request->file('image')->getClientOriginalExtension();
    $filenew='user'.auth()->user()->id ."." .$ext;
    $path=$request->file('image')->storeAS('public/usersphoto', $filenew);
    $userid=auth()->user()->id;
    $user=User::findOrFail($userid);
    $user->photo=$filenew;
    $user->save();
return redirect('/dashboard')->with('success', 'Your new profile photo has been updated');
}
}
