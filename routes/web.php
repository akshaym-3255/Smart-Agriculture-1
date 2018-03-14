<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('index');
});*/

use Illuminate\Support\Facades\Input;
use App\Http\Middleware\Admin;
use App\Sale;
use App\User;
Route::get('/',function() {
    return view('home');
});

Route::get('/consumer',function() {
    return view('pages.consumer');
});

Auth::routes();

Route::get('/test',function() {
    return view('test');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sell',function() {
    $user = User::find(auth()->id());
    if($user->type==1) {
        return redirect('/home')->with('error','Unauthorized. You are not a producer.');
    }
    return view('farmer.sell');
});

/*Route::prefix('admin')->group(function() {
    Route::get('/profile', 'AdminController@index');
    Route::get('')
});*/
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function() {
    Route::get('profile','AdminController@index');
    Route::get('users','AdminController@users');
    Route::get('users/deluser/{id}','AdminController@deluser');
    Route::get('users/adduser',function() {
        return view('admin.add_user');
    });
    Route::get('users/adduser/add','AdminController@adduser');
    Route::get('sales','AdminController@sales');
    Route::get('sales/delsale/{id}','AdminController@delsale');
    Route::get('reviews','AdminController@reviews');
    Route::get('reviews/delreview/{id}','AdminController@delreview');
    Route::get('requests','AdminController@requests');
    Route::get('requests/validate/1/{id}','AdminController@validate_sale');
});
  
Route::resource('sales','SalesController');

Route::resource('cart_items','CartController');

//Route::resource('admin','AdminController');

Route::get('profile/{id}','ProfileController@show');

Route::get('delitemfromcart','CartController@destory');

Route::any('/search',function() {
    $q = Input::get('q');
    $sales = Sale::where('name','LIKE','%'.$q.'%')->get();
    return view('consumers.index')->with('sales',$sales);
});

Route::get('/edit/{id}','SalesController@edit');

Route::get('/delete/{id}','SalesController@destroy');

Route::resource('review','ReviewController');

Route::get('/checkout','CartController@show');

Route::get('/government',function() {
    $farmers = User::where('type',2)->get();
    return view('government.farm_history')->with('farmers',$farmers);
});
/*
Route::get('admin/profile', ['middleware' => 'admin', function () {  
    return view('admin.profile');
}]);
*/