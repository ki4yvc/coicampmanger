@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Troop Registration</div>

                  <div class="panel-body">
                    <div class="form">
                    
                      <form action="{{ url('troopregistration') }}" method="POST">
                        {!! csrf_field() !!}

                        <label for="firstname">Scoutmaster First Name:</label>
                        <input type="text" class="form-control" id="firstname">
                        <br>
                        <label for="lastname">Scoutmaster Last Name:</label>
                        <input type="text" class="form-control" id="lastname">
                        <br>
                        <label for"phone">Scoutmaster Phone:</label>
                        <input type="text" class="form-control" id="phone">
                        <br>
                        <label for"email">Scoutmaster Email:</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" id="email">
                        <br>
                        <label for"troopnumber">Troop Number:</label>
                        <input type="text" class="form-control" pattern="[0-9]{3}" id="troopnumber">
                        <br>
                        <label for="council">Council</label>
                        <select class ="form-control" id ="council">
                          <option value="blueridgecouncil">Blue Ridge Council</option>
                          <option value="indianwaterscouncil">Indian Waters Council</option>
                          <option value="palmettocouncil">Palmetto Council</option>
                        </select>
                        <br>
                        <label for="week">Week Attending Camp</label>
                        <select class ="form-control" id ="week">
                          <option value="1">Week 1</option>
                          <option value="2">Week2</option>
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
