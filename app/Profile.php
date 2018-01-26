<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Profile extends Model
{
    protected $id = 'id';
    protected $name = 'name';
    protected $sales = 'sales';
    public function user() {
        return $this->belongsTo('App\User');
    }
}
