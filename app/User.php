<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
use App\Review;
use App\Sale;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type','user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sales(){
        return $this->hasMany('App\Sale');
    }
    public function cart_items() {
        return $this->hasMany('App\CartItem');  //NOTE: REMOVED RELATIONS, PLEASE ADD BACK IF NECESSARY
    }
    public function profile() {
        return $this->hasOne('App\Profile');
    }
    public function review() {
        return $this->hasMany('App\Review');
    }
}
