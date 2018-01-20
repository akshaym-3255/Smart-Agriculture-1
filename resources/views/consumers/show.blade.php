@extends('layouts.index')

@section('content')
<div class="container">
    <a href="/sales">Go Back</a>
    <h1>{{$sale->name}}</h1>
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
            <button type="submit" class="btn btn-primary">Add to cart</button>
        </div>
</div>
@endsection