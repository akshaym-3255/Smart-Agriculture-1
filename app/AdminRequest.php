<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Sale;
use App\Review;
class AdminRequest extends Model
{
    protected $table = 'admin_requests';
    protected $id = 'id';
    protected $request_type = 'request_type';
    /*public function get_request() {
        $request = 
    }*/
    public function get_request_type($type) {
        //$type = $request_type;
        $types = DB::select("select * from request_type where id = ?",[$type]);
        return $types[0]->request;
    }
    public function sale() {
        return $this->belongsTo('App\Sale','id','id');
    }
    public function review() {
        return $this->belongsTo('App\Review','id','id');
    }
    /*public function get_sale($sale_id) {
        $sale = Sale::find($sale_id);
        $sale = Sale::find($sale_id);
        return $sale;
    }
    public function get_review($review_id) {
        $review = Review::find($review_id);
        return $review;
    }*/
}
