<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
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
}
