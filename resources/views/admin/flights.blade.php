@extends('layouts.master')

@section('title')
    Flights | reservation system
@endsection

@section('name')
    Flights List
@endsection

@section('content')

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Flights List</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
                <thead class="text-info">
              {{-- <thead class="text-secondary"> --}}
                <th>ID</th>
                <th>Form</th>
                <th>To</th>
                <th>Departure Date</th>
                <th>Delete</th>

              </thead>
              <tbody>
                @foreach ($flight as $row)
                    
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->from}}</td>
                  <td>{{$row->to}}</td>
                  <td>{{$row->depature_date}}</td>
                  <td>
                    <form action="{{ route('admin.flights.destroy', $row->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                
                {{-- @foreach ($users as $user)
          
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray() ) }}</td>
                      <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success btn-sm">EDIT</a>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-right">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                        </form>
                      </td>
                  </tr>

                @endforeach --}}
              </tbody>
            </table>
              {{$flight->links()}}
          </div>
        </div>
      </div>
    </div>

@endsection

@section('script')
    
@endsection