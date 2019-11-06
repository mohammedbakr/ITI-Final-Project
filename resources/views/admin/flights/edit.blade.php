@extends('layouts.master')

@section('name')
    Flight Edit
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Flight</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form class="form-group" action="{{ route('admin.flights.update', $flight->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>FROM</label>
                                <input type="text" name="from" value="{{ $flight->from }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TO</label>
                                <input type="text" name="to" value="{{ $flight->to }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>DEPARTURE DATE</label>
                                <input type="text" name="departure_date" value="{{ $flight->departure_date }}" class="form-control" placeholder="YYYY/MM/DD" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
                            </div>
                            <div class="form-group">
                                <label>TIME</label>
                                <input type="text" name="time" value="{{ $flight->time }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>ARRIVAL DATE</label>
                                <input type="text" name="arrival_date" value="{{ $flight->arrival_date }}" class="form-control" placeholder="YYYY/MM/DD" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
                            </div>
                            <div class="form-group">
                                <label>PRICE</label>
                                <input type="text" name="price" value="{{ $flight->price }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>AVAILABLE SEATS</label>
                                <input type="text" name="available_seats" value="{{ $flight->available_seats }}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success float-left">Update</button>
                        </form>
                        <form class="form-group" action="{{ route('admin.flights.index')}}" method="post">
                            @csrf
                            @method('get')
                            <button type="submit" class="btn btn-danger float-right">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection