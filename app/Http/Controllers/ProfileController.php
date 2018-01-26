<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Profile;
use App\User;
class ProfileController extends Controller
{
    public function show($id) {
        $user = User::find($id);
        return view('farmer.profile')->with('user',$user);
    }
}
