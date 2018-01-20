@extends('layouts.index')

@section('content')
<div id="con" class="container">
    <h1>On Sale</h1>
    @if(count($sales) > 0)
    {{$count = 0}}
        @foreach($sales as $sale)
        @if(($count++)%3==0)
        <div class="container">
                <div class="row">
                    @endif
                    <div class="col-md-4">
                        <div class="well" style="background-color:#ebeef4">
                            <h3><a href="/sales/{{$sale->id}}">{{$sale->name}}</a></h3>
                            @if($sale->discount==0)
                            <h5>₹{{$sale->price}}</h5>
                            @elseif($sale->discount!=0)
                            <h5><strike>₹{{$sale->price}}</strike> ₹{{$sale->price-($sale->price*$sale->discount/100)}}</h5>
                            @endif
                        </div>
                    </div>
                    @if(($count)%3==0)
                </div>
        </div>
        @endif
        @endforeach
        @else
        <p>No Items on Sale</p>
    @endif
</div>
<script>
/*    var con = document.getElementById('con');
    @if(count($sales) > 0)
    {{$count=0}}
    @foreach($sales as $sale) 
        {{$count++}}
        @if(($count-1)%3==0)
            var container = document.createElement('div');
            container.className = "container";
            var row = document.createElement('div');
            row.className = "row";
            var well = document.createElement('div');
            well.className = "well";
            row.appendChild(well);
            container.appendChild(row)
            con.appendChild(container);

        @endif
    @endforeach
    @endif*/
</script>
@endsection