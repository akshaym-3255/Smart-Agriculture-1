<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItem;
use App\Sale;
use App\User;
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
        //TODO: Fix SQL error
        //TODO: Fix updating issue
        $this->validate($request,['quantity'=>'required']);
        $CartItems = CartItem::where([['user_id','=',auth()->id()],
                                    ['id','=',$request->input('id')]])
                                    ->get();
        if($CartItems === null) {
            $CartItem = new CartItem;
            $CartItem->id = $request->input('id');
            $CartItem->user_id = auth()->id();
            $CartItem->quantity = $request->input('quantity');
            $CartItem->save();
            return back()->with('success',$request->quantity.' items added to cart');
            /*$CartItem->quantity+=$request->input('quantity');
            $CartItem->save();
            return back()->with('success',$request->input('quantity').' items added to cart');*/
        }
        else {
            foreach($CartItems as $CartItem) {
                $CartItem->quantity+=$request->input('quantity');
                $CartItem->save();
                return back()->with('success',$request->input('quantity').' items added to cart'); 
            }
        }
       /* $CartItem = new CartItem;
        $CartItem->id = $request->input('id');
        $CartItem->user_id = auth()->id();
        $CartItem->quantity = $request->input('quantity');
        $CartItem->save();
        return back()->with('success',$request->quantity.' items added to cart');*/
    }
    //to update the cart contents, ie, add to or delete from the quantity of a cartitem
    public function update($id,$add) {
        $CartItem = CartItem::find($id);
        $CartItem->quantity += $add;
        $CartItem->save();
        //return some view
    }

    public function destroy($id) {
        $CartItems = CartItem::where('user_id','=',auth()->id())->get();
        foreach($CartItems as $CartItem) {
            if($CartItem->id == $id) {
                $CartItem->delete();
                return back()->with('success','x items deleted');
            }
        }
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
            $total+=($cartitem->sale->price)*($cartitem->quantity);
            $totalitems++;
        }
        return view('consumers.checkout')->with('cartitems',$cartitems)
                                         ->with('total',$total)
                                         ->with('totalitems',$totalitems);
    }
}
