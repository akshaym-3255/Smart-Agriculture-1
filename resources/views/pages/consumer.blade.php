@extends('layouts.index')

@section('content')
<div class="container horizontal-center">
        <div class="row">
            <button class="btn btn-default" onclick="window.location='/sell'">Sell goods</button>
            <button class="btn btn-default" onclick="window.location='/sales'">Buy goods</button>
        </div>
        <br />
        <div class="row">
            <button class="btn btn-default">Contact government</button>
            <button class="btn btn-default">Feedback</button>
        </div>
    </div>
@endsection