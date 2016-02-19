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
                          <td>Troop Number</td>
                          <td>Council</td>
                          <td>Week</td>
                          <td>Scoutmaster Name</td>
                          <td>Phone Number</td>
                          <td>Email</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($troops as $key => $value)
                          <tr>
                            <td>{{ $value->troop }}</td>
                            <td>{{ $value->council }}</td>
                            <td>{{ $value->week_attending_camp }}</td>
                            <td>{{ $value->scout_master_first_name }} {{ $value->scout_master_last_name }}</td>
                            <td>{{ $value->scout_master_phone }}</td>
                            <td>{{ $value->scout_master_email }}</td>

                            <td>
                              <a class="btn btn-small btn-info" href="{{ URL::to('troop/' . $value->id . '/edit') }}">
                                <i class="fa fa-edit"></i> Edit</a>
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
