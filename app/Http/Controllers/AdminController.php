<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Sale;
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

    public function sales() {
        $sales = Sale::all();
        return view('admin.sales')->with('sales',$sales);
    }

    public function adduser(Request $request) {
        $this->validate($request, ['n'=>'required','email'=>'required','password'=>'required','conf_password'=>'required']);
        if ($request->password != $request->conf_password) {
            return back()->with('error','Passwords don\'t match');
        }
        $user = new User;
        $user->name = $request->n;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = $request->type;
        $user->save();
        return view('admin.profile')->with('success','x');
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

    public function delsale($id) {
        $sale = Sale::find($id);
        $sale->delete();
        return back()->with('success','Item removed from database.');
    }
}