@extends('layouts.index')

@section('content')
<div class="container">
    <div class="panel panel-default">
    <div class="panel-heading">Add User</div>
    <div class="panel-body">
        {!! Form::open(['action'=>'AdminController@adduser','method'=>'GET','enctype'=>'multipart/form-data']) !!}
        <div class = "col-md-6">
            {{Form::label('n','Name',['class'=>'col-md-4 control-label'])}}
            {{Form::text('n','',['class'=>'col-md-6','placeholder'=>'Name'])}}
        </div>
        <div id="sel1" class = "col-md-6">
            {{Form::label('type','Type:',['class'=>'col-md-4 control-label'])}}
            {{Form::select('type',[1=>'Consumer',2=>'Producer'],['class'=>'col-md-6'])}}
        </div>
        <div id="farmer-address" class="col-md-6">
            {{Form::label('address','Address',['class'=>'col-md-4 control-label'])}}
            {{Form::textarea('address','',['class'=>'col-md-6'])}}
        </div>
        <div class = "col-md-6">
            {{Form::label('email','E-mail',['class'=>'col-md-4 control-label'])}}
            {{Form::text('email','example@gmail.com',['class'=>'col-md-6','placeholder'=>'E-mail'])}}
        </div>
        <div class = "col-md-6">
            {{Form::label('password','Password',['class'=>'col-md-4 control-label'])}}
            {{Form::password('password',['class'=>'col-md-6'])}}
        </div>
        <div class = "col-md-6">
            {{Form::label('conf_password','Confirm Password',['class'=>'col-md-4 control-label'])}}
            {{Form::password('conf_password',['class'=>'col-md-6'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
    </div>
</div>
<script type="text/javascript"
    src="jquery-ui-1.10.0/tests/jquery-1.9.0.js"></script>
<script src="jquery-ui-1.10.0/ui/jquery-ui.js"></script>
<script> 
    $(document).ready(function() {
        $('#sel1').change(function(){
            var selection = $('#sel1').val();
            if(selection==1) {
                $('#farmer-address').hide();
            }
            else if (selection==2) {
                $('#farmer-address').show();
            }
        }).change();
    });
</script>
@endsection