<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Profile;
use App\User;
class ProfileController extends Controller
{
    public function store($data) {
        $id = User::orderBy('id','desc')->first()->id;
        $id++;
        $profile = new Profile;
        $profile->id = $id;
        $profile->address = $data['address'];
        $profile->sales = 0;
        $profile->save();
    }

    public function show($id) {
        $user = User::find($id);
        return view('farmer.profile')->with('user',$user)->with('sales',$user->sales);
    }
}
