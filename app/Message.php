<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $table="messages";
    protected $primaryKey="id";

    //

    public function User()
    {
    return  $this->belongsTo('App\User');
    }
    public function Comment()
    {
        return  $this->hasMany('App\Comment');
    }
}
