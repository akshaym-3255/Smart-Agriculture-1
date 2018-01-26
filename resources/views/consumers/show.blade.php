@extends('layouts.index')
<!--TODO: resolve illegal string offset 'name' error-->
@section('content')
<div class="container">
    <a href="/sales">Go Back</a>
    {!! Form::open(['action'=>'CartController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <h1>{{$sale->name}}</h1>
    {{Form::hidden('id',$sale->id)}}
    <p>Producer: {{$sale->user->name}}</p>
        <div class="container">
            <div class="well well-lg">
                <div class="row">
                    @if($sale->discount==0)
                    <h3>₹{{$sale->price}} / {{$sale->unit_for_price->name}}</h3>
                    @elseif($sale->discount!=0)
                    <h3><strike>₹{{$sale->price}}</strike> ₹{{$sale->price-($sale->price*$sale->discount/100)}} / {{$sale->unit_for_price->name}}</h3>
                    @endif
                    <h3>{{$sale->information}}</h3>
                </div>
            </div>
            {{Form::text('quantity','',['class'=>'form-control','placeholder'=>'Type here...'])}}
            {{Form::submit('Add to Cart',['class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
        </div>
</div>
@endsection