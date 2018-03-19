@extends('layouts.index')

@section('content')
@include('inc.admin_navbar')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Notifications</div>
                    <div class="panel-body">
                        @foreach($adminrequests as $adminrequest)
                        <div class="col-md-12">
                            <h2>{{$adminrequest->get_request_type($adminrequest->request_type)}}</h2>
                            @if($adminrequest->request_type == 1)
                                <p>User: {{$adminrequest->sale($adminrequest->id)->user->name}}</p> 
                                <p>Product: {{$adminrequest->sale($adminrequest->id)->name}}</p>
                                <p>Price/unit: {{$adminrequest->sale($adminrequest->id)->price}} / {{$adminrequest->sale($adminrequest->id)->unit_for_price->name}}</p>
                                <p>Quantity: {{$adminrequest->sale($adminrequest->id)->quantity}} {{$adminrequest->sale($adminrequest->id)->unit_for_quantity->name}}</p>
                                <p>Information: {{$adminrequest->sale($adminrequest->id)->information}}</p>
                            @endif
                            @if($adminrequest->request_type == 2)
                                <p>{{$adminrequest->review->user->name}}</p>
                                <p>{{$adminrequest->review->title}}</p>
                            @endif
                            <a class="btn btn-primary pull-right" href="requests/validate/{{$adminrequest->request_type}}/{{$adminrequest->request_id}}">Validate</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection