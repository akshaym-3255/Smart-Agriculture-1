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
        <td>₹{{$sale->price}}/{{$sale->unit_for_price->name}}</td>
        @if(auth()->id() == $sale->user_id)
        <td><a href="/edit/{{$sale->id}}"><button class="btn btn-default">Edit</button></a></td>
        <td><a href="/delete/{{$sale->id}}"><button class="btn btn-danger">Delete</button></a></td>
        @endif
        </tr>
        @endforeach
    </table>
    @endif
</div>
@endsection