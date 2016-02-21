@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Scout Schedule Editing</div>

        <div class="panel-body">
          <div class="form">
            <form action="{{ url('scout/'.$scout->id.'/schedule') }}" method="POST">
              {!! csrf_field() !!}
              <input name="_method" type="hidden" value="PUT">
              
              <div class="panel panel-default">
                <div class="panel-heading">
                  {{ $scout->lastname }}, {{ $scout->firstname }} - <strong>{{ $scout->age }} Years Old:</strong>
                  <a href="{{ URL::to('#') }}"><i class="fa fa-print"> Print Schedule</i></a> |
                  <a href="{{ URL::to('scout/' . $scout->id . '/edit') }}"><i class="fa fa-user"> Edit Scout</i></a>
                </div>
                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <td>Time</td>
                        <td>Monday</td>
                        <td>Tuedsay</td>
                        <td>Wednesday</td>
                        <td>Thurseday</td>
                        <td>Friday</td>
                      </tr>
                    </thead>
                    <tr>
                      <td>9:00am-12:00pm</td>
                      @if(!empty($mo912))
                      <td><a href="#">{{ $mo912 }}</a></td>
                      @else
                      <td><a href="#">Free</a></td>
                      @endif
                      @if(!empty($tu912))
                      <td><a href="#">{{ $tu912 }}</a></td>
                      @else
                      <td><a href="#">Free</a></td>
                      @endif
                      @if(!empty($we912))
                      <td><a href="#">{{ $we912 }}</a></td>
                      @else
                      <td><a href="#">Free</a></td>
                      @endif
                      @if(!empty($th912))
                      <td><a href="#">{{ $th912 }}</a></td>
                      @else
                      <td><a href="#">Free</a></td>
                      @endif
                      @if(!empty($fr912))
                      <td><a href="#">{{ $fr912 }}</a></td>
                      @else
                      <td><a href="#">Free</a></td>
                      @endif
                    </tr>
                    <tr>
                      <td>2:000pm-5:00pm</td>
                      <td>{#{  }#}</td>
                      <td>{#{  }#}</td>
                      <td>{#{  }#}</td>
                      <td>{#{  }#}</td>
                      <td>{#{  }#}</td>
                    </tr>
                    <tr>
                      <td>7:00pm-9:00pm</td>
                      <td>{#{  }#}</td>
                      <td>{#{  }#}</td>
                      <td>{#{  }#}</td>
                      <td>{#{  }#}</td>
                      <td>{#{  }#}</td>
                    </tr>
                  </table>
                </div>
              </div>

              <br><input class="btn btn-default" type="submit" value="Submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ~7Div0w2 -->
@endsection