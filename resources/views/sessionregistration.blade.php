@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <form>
                    <label for"<Select a Scout">Select a Scout:</label>
                      <select>
                        <option value="<Select a Scout>">(Scout Name)</option>
                      </select>
                    <br>
                    <br>Monday Session:<select>
                      <option value="mondayclass">(Moday Session)</option>
                    </select><br>
                    Tuesday Session:<select>
                      <option value="tuesdayclass">(Tuesday Session)</option>
                    </select><br>
                    Wednesday Session:<select>
                      <option value="wednesdayclass">(Wednesday Session)</option>
                    </select><br>
                    Thursday Session:<select>
                      <option value="thurdayclass">(Thruseday Session)</option>
                    </select><br>
                    Friday Session:<select>
                      <option value="fridayclass">(Friday Session)</option>
                    </select><br>
                    <br><input type="submit" value="Submit"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
