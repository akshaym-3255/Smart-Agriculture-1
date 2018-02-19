<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Sale;
use App\Review;
use App\User;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('consumers.index')->with('sales',$sales)->with('count',0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,['name'=>'required','price'=>'required']);
        if($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
        }
        else {
            $fileNameToStore = 'noimage.jpeg';
        }
        $sale = new Sale;
        $sale->name = $request->input('name');
        $sale->information = $request->input('information');
        $sale->price = $request->input('price');
        $sale->discount = $request->input('discount');
        $sale->quantity = $request->input('quantity');
        $sale->perquan = $request->input('perquan');
        $sale->perprice = $request->input('perprice');
        $sale->user_id = auth()->id();
        $sale->image = $fileNameToStore;
        $sale->save();
        $user = User::find(auth()->id());
        return view('farmer.profile')->with('success','Item(s) posted successfully')
                                    ->with('user',$user)
                                    ->with('sales',$user->sales);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id);
        $reviews = Review::where('id','=',$id)->get();
        return view('consumers.show')->with('sale',$sale)
                                    ->with('reviews',$reviews);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);
        if(auth()->id() !== $sale->user_id) {
            return back()->with('error','Your trespassing has been reported. Expect a visit from the Trenchcoat Mafia soon.');
        }
        return view('farmer.edit')->with('sale',$sale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,['name'=>'required','price'=>'required']);
        $sale = Sale::find($id);
        $sale->name = $request->input('name');
        $sale->information = $request->input('information');
        $sale->price = $request->input('price');
        $sale->discount = $request->input('discount');
        $sale->quantity = $request->input('quantity');
        $sale->perquan = $request->input('perquan');
        $sale->perprice = $request->input('perprice');
        $sale->user_id = auth()->id();
        $sale->save();
        $user = User::find(auth()->id());
        $sales = Sale::where('user_id',auth()->id())->get();
        return view('farmer.profile')->with('success','Item(s) updated successfully')->with('user',$user)->with('sales',$sales);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);
        if(auth()->id() !== $sale->user_id) {
            return back()->with('error','Your trespassing has been reported. Expect a visit from the Trenchcoat Mafia soon.');
        }
        $sale->delete();
        return back()->with('success','Item(s) deleted successfully');
    }
}





/*
$this->validate($request,[
    'title' => 'required',
    'body' => 'required',
    'cover_image' => 'image|nullable|max:1999'
]);
//Handle file upload
if($request->hasFile('cover_image')) {
    $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

    $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

    $extension = $request->file('cover_image')->getClientOriginalExtension();

    $fileNameToStore = $filename.'_'.time().'.'.$extension;

    $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
}
else {
    $fileNameToStore = 'noimage.jpeg';
}
$post = new Post;
$post->title = $request->input('title');
$post->body = $request->input('body');
$post->user_id = auth()->user()->id;
$post->cover_image = $fileNameToStore;
$post->save();
return redirect('/posts')->with('success','Post Created');*/