@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Create a new class</div>

        <div class="panel-body">
          <div class="form">
            <form action="{{ url('sclass') }}" method="POST">
              {!! csrf_field() !!}
              <label for="classname">Class Name:</label>
              <input name="classname" type="text" class ="form-control" id="classname">
              <br>
              <label for="department">Department:</label>
              <select name="department" class="form-control" id="department">
                <option value="1">Aquatics</option>
                <option value="2">Civil Development</option>
                <option value="3">Ecology and Conservation</option>
                <option value="4">Field Sports</option>
                <option value="5">First Aid</option>
                <option value="6">Handicraft</option>
                <option value="7">Scoutcraft</option>
                <option value="8">STEAM</option>
                <option value="9">High Adventure</option>
              </select>
              <br>
              <label for="fee">Class Fee:</label>
              <input name="fee" type="text" class ="form-control" id="fee">
              <br>
              <label for="day">Day:</label>
              <select name="day" class ="form-control" id ="day">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesdy</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thurseday">Thurseday</option>
                <option value="Friday">Friday</option>
              </select>
              <br>
              <label for="duration">Class Duration:</label>
              <select name="duration" class ="form-control" id ="duration">
                <option value="AM Only">AM Only</option>
                <option value="PM Only">PM Only</option>
                <option value="AM & PM">AM & PM</option>
                <option value="2 Days">2 Days</option>
                <option value="Twilight">Twilight</option>
              </select>
              <br>
              <label for="age">Minimum Age:</label>
              <select name="age" class ="form-control" id ="age">
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
              </select>
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
