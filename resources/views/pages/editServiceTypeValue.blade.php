@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Set Service Type Value</h4><br/>
            <form class="form-horizontal" name="addServiceTypeValue" method="post" action="{{ url('/services/values/'.$value->id.'/edit') }}">
                <div class="form-group">
                   <input type="number" class="form-control" name="points" placeholder="Points" value="{{ $value->points }}">
           <div class="text-danger">{{ $errors->first('points') }}</div>

                </div>
                
                <div class="form-group">
                <button type="submit" class="btn btn-success"value="submit" name="submit">Submit</button>
                </div>
            </form>  
        </div>
    </div>
</div>

@stop
