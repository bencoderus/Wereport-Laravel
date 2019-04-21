<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    //
    protected $primaryKey="id";
    public $table="notification";

    public function user()
{
    return belongsTo('App\User');
}
}
