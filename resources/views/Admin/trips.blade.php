@extends('Admin')

@section('content')

<div class="m-5">

    <table class="pro_log">
        <thead>
            <tr>
                <th>Start Address</th>
                <th>End Address</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Available Size</th>
                <th>Available Weight</th>
                <th>Available Seats</th>

            </tr>
        </thead>
        <tbody>
        @foreach($trips as $trip)
            <tr>
                <td>{{$trip->start_address}}</td>
                <td>{{$trip->end_address}}</td>
                <td>{{$trip->start_time}}</td>
                <td>{{$trip->end_time}}</td>
                <td>{{$trip->available_size}}</td>
                <td>{{$trip->available_weight}}</td>
                <td>{{$trip->available_seats}}</td>

            </tr>
        </tbody>
        @endforeach
    </table>
   
</div>

@endsection