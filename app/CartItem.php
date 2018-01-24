<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';
    protected $name = 'name';  //Get from Sales table
    protected $quantity = 'quantity';
    public $primarykey = 'user_id';
    public $id = 'id';
    public $timestamps = true;
    public function user() {
        return $this->belongsTo('App\User','id','user_id');
    }
    public function name() {
        return $this->belongsTo('App\Sale');
    }
}
