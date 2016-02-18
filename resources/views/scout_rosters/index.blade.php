@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Current Information</div>

                <div class="panel-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <td>Name</td>
                          <td>Age</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($scout as $key => $value)
                          <tr>
                            <td>{{ $value->lastname }}, {{ $value->firstname}}</td>
                            <td>{{ $value->age }}</td>

                            <td>
                              <a class="btn btn-small btn-info" href="{{ URL::to('troop/' . $value->id . '/edit') }}">Edit</a>
                              <a class="btn btn-small btn-danger" href="{{ URL::to('/' . $value->id . '/deleate' )}} ">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
