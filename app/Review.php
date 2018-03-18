<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sale;
use App\User;
class Review extends Model
{
    protected $table = 'reviews';
    public $primarykey = 'id';
    protected $user_id = 'user_id';
    public $timestamps = true;
    public function user() {
        return $this->belongsTo('App\User');
    }
    /*public function adminrequest() {
        return $this->hasOne('App\AdminRequest','id','id');
    }*/
}
