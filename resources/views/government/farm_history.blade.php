@extends('layouts.index')

@section('content')
<div class="container">
    @if(count($farmers) > 0)
    <h1>Current Farmer Database</h1>
    @foreach($farmers as $farmer) 
    <a href="/profile/{{$farmer->id}}">{{$farmer->name}}</a>
    @if(count($farmer->sales) > 0)
    <table class="table">
        <tr>
            <th>Sale Name</th>
            <th>Price</th>
            <th>Discount</th>
        </tr>
        @foreach($farmer->sales as $sale)
        <tr>
            <td>{{$sale->name}}</td>
            <td>{{$sale->price}}</td>
            <td>{{$sale->discount}} %</td>
        </tr>
        @endforeach
    </table>
    @else
    <p>No items sold by this producer</p>
    @endif
    @endforeach
    @else
    <p>No farmers found!</p>
    @endif

</div>
@endsection