@extends('layouts.index')

@section('content')
@include('inc.admin_navbar')
<div class="container">
    @if(count($users)>0)
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Options</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            @if($user->type == 1)
            <td>Customer</td>
            @else
            <td>Producer</td>
            @endif
            <td>
            <a href="users/deluser/{{$user->id}}" class="btn btn-danger pull-right">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="panel-heading">Empty</div>
    @endif
</div>
@endsection