<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';
    protected $name = 'name';
    protected $quantity = 'quantity';
    protected $user_id = 'user_id';
    public $primarykey = 'id';
    public $timestamps = true;
}
