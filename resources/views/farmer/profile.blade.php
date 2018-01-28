@extends('layouts.index')

@section('content')
<div class="container">
    <p><b><i><u>{{$user->name}}</u></i></b></p>
    <p>Email: {{$user->email}}</p>
    @if(count($user->sales)>0)
    <h3>{{$user->name}}'s products:</h3>
    <table class="table">
        <tr>
        <th>Name</th>
        <th>Price/unit</th>
        </tr>
        @foreach($sales as $sale)
        <tr>
        <td>{{$sale->name}}</td>
        <td>{{$sale->price}}/{{$sale->unit_for_price->name}}</td>
        </tr>
        @endforeach
    </table>
    @endif
</div>
@endsection