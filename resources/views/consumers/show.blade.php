@extends('layouts.index')
<!--TODO: resolve illegal string offset 'name' error-->
@section('content')
<div class="container">
    <a href="/sales">Go Back</a>
    {!! Form::open(['action'=>'CartController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <h1>{{$sale->name}}</h1>
    {{Form::hidden('id',$sale->id)}}
    <p>Producer: <a href="/profile/{{$sale->user->id}}">{{$sale->user->name}}</a></p>
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
        <div class="container">
        @if(count($reviews)>0)
        @foreach($reviews as $review)
        <div class="row">
            <h5>{{$review->user->name}}</h5>
            <p>Written on: {{$review->created_at}}</p>
            @if($review->stars!==0)
            <p>{{$review->stars}} Stars</p>
            @endif
            <p>{{$review->body}}</p>
        </div>
        @endforeach
        @else
        <p>No reviews for this product</p>
        @endif
        </div>
        <div class="container">
            <h4>Submit Review</h4>
            {!!Form::open(['action'=>'ReviewController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                {{Form::hidden('id',$sale->id)}}
            <div class="form-group">
                {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title here...'])}}
            <div class="form-group">
            </div>
            <div class="form-group">
                {{Form::radio('stars','',['class'=>'star star-5'])}}
            </div>
            <div class="form-group">
                {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Type your review here...'])}}
            </div>
            {{Form::submit('Post Review',['class'=>'btn btn-default'])}}
            {!!Form::close()!!}
        </div>
</div>
@endsection