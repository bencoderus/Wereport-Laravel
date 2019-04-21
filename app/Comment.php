<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    public function message()
    {
        return  $this->belongsTo('App\Message');
    }
    public function user()
    {
        return  $this->belongsTo('App\User');
    }
}
