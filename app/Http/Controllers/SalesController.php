<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Sale;
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
        return view('consumers.index')->with('sales',$sales);
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
        $sale = new Sale;
        $sale->name = $request->input('name');
        $sale->information = $request->input('information');
        $sale->price = $request->input('price');
        $sale->discount = $request->input('discount');
        $sale->quantity = $request->input('quantity');
        $sale->perquan = $request->input('perquan');
        $sale->perprice = $request->input('perprice');
        $sale->user_id = auth()->id();
        $sale->save();
        return 123;
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
        return view('consumers.show')->with('sale',$sale);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
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