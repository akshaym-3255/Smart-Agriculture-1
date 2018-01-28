<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //protected $fillable = ['id'];
    protected $table = 'cart_items';
    protected $name = 'name';  //Get from Sales table
    protected $quantity = 'quantity';
    protected $user_id = 'user_id';   //changed from primary key
   // public $id = 'id';
    public $timestamps = true;
    public function user() {
        return $this->belongsTo('App\User','user_id','user_id');        //NOTE: REMOVED RELATIONS, PLEASE ADD BACK IF NECESSARY
    }
    public function sale() {
        return $this->belongsTo('App\Sale','id','id');
    }
}
