@extends('layouts.master')

@section('title')
    Edit-Register | reservation system
@endsection

@section('name')
    User Edit
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Profile</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="/users-update/{{$users->id}}" method="POST">
                                @csrf
                                {{method_field('put')}}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="username" value="{{$users->name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Give Role</label>
                                    <select name="usertype" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="">None</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/users" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    
@endsection