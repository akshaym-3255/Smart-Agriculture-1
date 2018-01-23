@extends('layouts.index')

@section('content')
<div class="container">
    <a href="/sales">Go Back</a>
    {!! Form::open(['action'=>'CartController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <h1>{{$sale->name}}</h1>
    {{Form::text('name','',['class'=>'form-control'])}}
    <p>Producer: {{$sale->user->name}}</p>
        <div class="container">
            <div class="well well-lg">
                <div class="row">
                    {{Form::text('id',$sale->id,'hidden',['class'=>'form-control'])}}
                    @if($sale->discount==0)
                    <h3>₹{{$sale->price}} / {{$sale->unit_for_price->name}}</h3>
                    {{Form::text('price',$sale->price,'hidden',['class'=>'form-control'])}}
                    @elseif($sale->discount!=0)
                    <h3><strike>₹{{$sale->price}}</strike> ₹{{$sale->price-($sale->price*$sale->discount/100)}} / {{$sale->unit_for_price->name}}</h3>
                    {{Form::text('price',$sale->price-($sale->price*$sale->discount/100),'hidden',['class'=>'form-control'])}}
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