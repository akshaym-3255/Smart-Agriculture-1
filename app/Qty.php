<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qty extends Model
{
    public $primarykey = 'id';
    protected $unit = 'unit';
    public $timestamps = true;
    public function unit_for_price() {
        return $this->belongsTo('App\Sale','perprice','id');
    }
    public function unit_for_quantity() {
        return $this->belongsTo('App\Sale','perquan','id');
    }
}
