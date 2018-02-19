@extends('layouts.index')

@section('content')
@include('inc.admin_navbar')
<div class="container">
    <a class="btn btn-primary pull-right">Add Item</a>
    @if(count($reviews)>0)
    <table class="table">
        <tr>
            <th>User</th>
            <th>Product</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Resultant Price</th>
            <th>Options</th>
        </tr>
        @foreach($sales as $sale)
        <tr>
            <td>{{$sale->name}}</td>
            <td>{{$sale->user->name}}</td>
            <td>{{$sale->price}}</td>
            <td>{{$sale->discount}}</td>
            <td>{{$sale->price - (($sale->price*$sale->discount) / 100)}}</td>
            <td>
            <a href="sales/delsale/{{$sale->id}}" class="btn btn-danger pull-right">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="panel-heading">Empty</div>
    @endif
</div>
@endsection