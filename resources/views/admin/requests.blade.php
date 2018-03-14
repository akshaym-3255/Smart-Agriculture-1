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
                            <div class="row">
                                {{$adminrequest->get_request_type($adminrequest->request_type)}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection