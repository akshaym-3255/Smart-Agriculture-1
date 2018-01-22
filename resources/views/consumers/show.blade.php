@extends('layouts.index')

@section('content')
<div class="container">
    <a href="/sales">Go Back</a>
    {!! Form::open(['action'=>'CartController@add','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <h1 name="name">{{$sale->name}}</h1>
    <p>Producer: {{$sale->user->name}}</p>
        <div class="container">
            <div class="well well-lg">
                <div class="row">
                    @if($sale->discount==0)
                    <h3>₹<label name="price">{{$sale->price}}</label> / {{$sale->unit_for_price->name}}</h3>
                    @elseif($sale->discount!=0)
                    <h3><strike>₹{{$sale->price}}</strike> ₹<label name="price">{{$sale->price-($sale->price*$sale->discount/100)}}</label> / {{$sale->unit_for_price->name}}</h3>
                    @endif
                    <h3>{{$sale->information}}</h3>
                </div>
            </div>
            {{Form::text('quantity','',['class'=>'form-control','placeholder'=>'Type here...'])}}
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
        </div>
</div>
@endsection