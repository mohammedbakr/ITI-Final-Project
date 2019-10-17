@extends('layouts.master')

@section('title')
    About Us | reservation system
@endsection

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add About Us</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/aboutus-save" method="POST">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="title" class="col-form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="form-group">
                <label for="description" class="col-form-label">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
              </div>
              <div class="form-group">
                  <label for="body" class="col-form-label">Body:</label>
                  <textarea class="form-control" id="body" name="body"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> About Us</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add</button>
              
              @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
              @endif

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>body</th>
                    <th class="text-right">Edit</th>
                    <th class="text-right">Delete</th>
                  </thead>
                  <tbody>
                      {{-- @foreach ($posts as $item) --}}
                    {{-- <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->title}}</td>
                      <td>{{$item->description}}</td>
                      <td>{{$item->body}}</td>
                      <td class="text-right">
                            <a href="/role-edit/{{$row->id}}" class="btn btn-success">EDIT</a>
                        </td>
                        <td class="text-right">
                            <form action="/role-delete/{{$row->id}}" method="POST">
                                @csrf
                                {{method_field('delete')}}
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr> --}}
                    {{-- @endforeach --}}
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
</div>
@endsection

@section('script')
    
@endsection