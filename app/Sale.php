<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $name = 'name';
    public $primarykey = 'id';
    public $timestamps = true;
    protected $price = 'price';
    protected $quantity = 'quantity';
    protected $perprice = 'perprice';
    protected $perqt = 'perquan';
    protected $discount = 'discount';
    protected $information = 'information';
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function unit_for_price() {
        return $this->hasOne('App\Qty','id','perprice');
    }
    public function unit_for_quantity() {
        return $this->hasOne('App\Qty','id','perquan');
    }
    public function cartitem() {
        return $this->hasMany('App\CartItem','id','id');
    }
}
