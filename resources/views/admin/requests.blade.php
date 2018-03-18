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
                            {{$adminrequest->get_request_type($adminrequest->request_type)}}
                            @if($adminrequest->request_type == 1) 
                                <p>{{$adminrequest->sale->name}}</p>
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