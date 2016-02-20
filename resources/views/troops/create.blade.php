@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Troop Registration</div>

                  <div class="panel-body">
                    <div class="form">

                      <form action="{{ url('troop') }}" method="POST">
                        {!! csrf_field() !!}

                        <label for="firstname">Scoutmaster First Name:</label>
                        <input name="firstname" type="text" class="form-control" id="firstname" required="required">
                        @if($errors->first('firstname'))
                          <span class="error">First Name is required</span>
                        @endif
                        <br>
                        <label for="lastname">Scoutmaster Last Name:</label>
                        <input name="lastname" type="text" class="form-control" id="lastname">
                        <br>
                        <label for"phone">Scoutmaster Phone:</label>
                        <input name="phone" type="text" class="form-control" id="phone">
                        <br>
                        <label for"email">Scoutmaster Email:</label>
                        <input name="email" type="text" class="form-control" value="{{ Auth::user()->email }}" id="email">
                        <br>
                        <label for"troopnumber">Troop Number:</label>
                        <input name="troopnumber" type="text" class="form-control" pattern="[0-9]{3}" id="troopnumber">
                        <br>
                        <label for="council">Council</label>
                        <select name="council" class ="form-control" id="council">
                          <option value="Blue Ridge Council">Blue Ridge Council</option>
                          <option value="Indian Waters Council">Indian Waters Council</option>
                          <option value="Palmetto Council">Palmetto Council</option>
                        </select>
                        <br>
                        <label for="week">Week Attending Camp</label>
                        <select name="week" class="form-control" id="week">
                          <option value="1">Week 1</option>
                          <option value="2">Week 2</option>
                          <option value="3">Week 3</option>
                          <option value="4">Week 4</option>
                          <option value="5">Week 5</option>
                          <option value="6">Week 6</option>
                          <option value="8">Week 7</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-default">
                          <i class="fa fa-check"></i> Register Troop
                        </button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
