@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Add Car Model</h4><br/>
            <form class="form-horizontal" name="addModel" method="post" action="{{ url('/models/add') }}">
                <div class="form-group">
                    <label>Make</label>
                    <select name="make_id"class="form-control">
                        @forelse($makes as $make)
                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                        @empty
                        <option>No Makes in database</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                        <label>Model Name</label>
                    <input type="text" class="form-control"name="name" placeholder="Model Name">
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                </div>               
                <div class="form-group">
                    <button type="submit" class="btn btn-success"value="submit" name="submit">Submit</button>
                </div>
            </form>  
        </div>
    </div>
</div>

@stop
