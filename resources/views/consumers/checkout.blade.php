@extends('layouts.index')
<!--TODO: Purchase-->
@section('content')
<div class="container">
    <div class="well">
        @if(count($cartitems)>0)
        <table class="table">
        <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        </tr>
        @foreach($cartitems as $cartitem)
        <tr>
        <td>{{$cartitem->sale->name}}</td>
        <td>{{$cartitem->sale->price}}</td>
        <td>{{$cartitem->quantity}}</td>
        </tr>
        @endforeach
        <td class="right"><b>No. of items: {{$totalitems}}</b></td>
        <td class="right"><b>Total: {{$total}}</b></td>
        </table>
    </div>
    <button type="submit" class="btn btn-primary">Purchase</button>
</div>
        @else
        <p>No Items in cart. Buy some of our products!</p>
    </div>
</div>
        @endif
@endsection