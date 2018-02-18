<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.profile');
    }

    public function users() {
        $users = User::all();
        return view('admin.users')->with('users',$users);
    }

    public function deluser($id) {
        $user = User::find($id);
        if(auth()->id() == $id) {
            return back()->with('error','Permission Denied.');
        }
        if($user->type == 2) {
            $sales = $user->sales;
            foreach($sales as $sale) {
                $sale->delete();
            }
        }
        $user->delete();
        return back()->with('success','User removed from database');
    }
}