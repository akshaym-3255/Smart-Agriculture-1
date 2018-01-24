<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItem;
class CartController extends Controller
{
    //Add a new item to the cart
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request,['quantity'=>'required']);
        $CartItem = new CartItem;
        $CartItem->id = $request->input('id');
        $CartItem->user_id = auth()->id();
        $CartItem->quantity = $request->input('quantity');
        $CartItem->save();
        return 123;
    }
    //to update the cart contents, ie, add to or delete from the quantity of a cartitem
    public function update($id,$add) {
        $CartItem = CartItem::find($id);
        $CartItem->quantity += $add;
        $CartItem->save();
        //return some view
    }

    public function delete($id) {
        $CartItem = CartItem::find($id);
        $CartItem->delete();
        //return some view
    }

    public function total($user_id) {
        $total = 0;
        $CartItems = Cart::where('user_id',$user_id)->get();
        foreach($CartItems as $CartItem) {
            $itemtotal = ($CartItem->price)*($CartItem->quantity);
            $total+=$itemtotal;
        }
        return view('consumer.checkout')->with('total',$total);
    }
    
    public function totalItems($user_id) {
        $total = 0;
        foreach(Cart::find($user_id) as $CartItem) {
            $total++;
        }
        return $total;
    }
    public function show() {
        $total = 0;
        $totalitems = 0;
        $user_id = auth()->user()->id;
        $cartitems = CartItem::where('user_id', $user_id)->get();
        foreach($cartitems as $cartitem) {
            $total+=($cartitem->price)*($cartitem->quantity);
            $totalitems++;
        }
        return view('consumers.checkout')->with('cartitems',$cartitems)
                                         ->with('total',$total)
                                         ->with('totalitems',$totalitems);
    }
}
