@extends('layouts.default')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align: center;">Send Alert To Administrator</h4><br/>
            <form class="form-horizontal" name="addBroadcast" method="post" action="{{ url('/stations/alerts/add') }}">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label>Message:</label>
                 <textarea name="message" class="form-control"></textarea>
                </div>
                
                <div class="form-group">
                <button type="submit" value="Submit" name="submit" class="btn btn-success">Submit</button>
                </div>
    </form>
        </div>
    </div>
</div>
@stop