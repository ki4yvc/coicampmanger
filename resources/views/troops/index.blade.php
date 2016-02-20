@extends('layouts.app')

@section('content')
  
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if($notroop)
            <div class="mar-12">
              <a class="btn btn-small btn-info" href="{{ URL::to('troop/create') }}">
                <i class="fa fa-plus-square-o"></i> New Troop
              </a>
            </div>
            @endif
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
                              <form action="{{ url('troop/'.$value->id) }}" method="POST">
                                {!! csrf_field() !!}
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-small btn-danger" onclick="open_modal('are you sure?', '{{ url('troop/'.$value->id) }}', true, 'DELETE')">
                                  <i class="fa fa-trash"></i> Delete
                                </button>
                              </form>
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

