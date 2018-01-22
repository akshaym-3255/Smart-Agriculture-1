<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //Add a new item to the cart

    public function add(Request $request) {
        $this->validate($request,['name'=>'required','price'=>'required','quantity'=>'required']);
        $CartItem = new CartItem;
        $CartItem->id = $request->id;
        $CartItem->user_id = auth()->id();
        $CartItem->name = $request->name;
        $CartItem->quantity = $request->quantity;
        $CartItem->save();
        //return some view
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
        foreach(Cart::find($user_id) as $CartItem) {
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
}
