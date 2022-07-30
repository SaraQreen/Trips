@extends('Admin')

@section('content')

<div class="m-5">

    <table class="pro_log">
        <thead>
            <tr>
                <th>Trip ID</th>
                <th>Start Point</th>
                <th>End Point</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Driver ID</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>
        @foreach($trips as $trip)
            <tr>
                <td>{{$trip->trip_id}}</td>
                <td>{{$trip->start_point_longitude}}</td>
                <td>{{$trip->end_point_longitude}}</td>
                <td>{{$trip->start_time}}</td>
                <td>{{$trip->end_time}}</td>
                <td>{{$trip->driver_id}}</td>
                <td>{{$trip->status_id}}</td>

            </tr>
        </tbody>
        @endforeach
    </table>
   
</div>

@endsection