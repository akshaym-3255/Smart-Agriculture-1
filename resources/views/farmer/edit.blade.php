@extends('layouts.index')

@section('content')
<div class="container">
    <h1>Make Sale</h1>
    <p>Post all available information about your item(s) here. Click submit once done.</p>
    {!! Form::open(['action'=>['SalesController@update',$sale->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class = "form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name',$sale->name,['class'=>'form-control','placeholder'=>'Name'])}}
    </div>
    <div class = "form-group">
        {{Form::label('quantity','Quantity')}}
        {{Form::text('quantity',$sale->quantity,['class'=>'form-control','placeholder'=>'Quantity'])}}{{Form::select('perquan',['0'=>'Kilogram','1'=>'Gram','2'=>'Litre'],['class'=>'form-control','placeholder'=>'Unit'])}}
    </div>
    <div class = "form-group">
        {{Form::label('price','Price per kg/gm/L')}}
        {{Form::text('price',$sale->price,['class'=>'form-control','placeholder'=>'Price here...'])}}{{Form::select('perprice',['0'=>'Kilogram','1'=>'Gram','2'=>'Litre'],['class'=>'form-control','placeholder'=>'Unit'])}}
    </div>
    <div class = "form-group">
        {{Form::label('discount','Discount rate (in percent)')}}
        {{Form::text('discount',$sale->quantity,['class'=>'form-control','placeholder'=>'Announce your discount...'])}}
    </div>
    <div class = "form-group">
        {{Form::label('information','Additional Information(optional)')}}
        {{Form::textarea('information',$sale->information,['class'=>'form-control','placeholder'=>'Any additional information you can give'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {{Form::hidden('_method','PUT')}}
    {!! Form::close() !!}
</div>
@endsection