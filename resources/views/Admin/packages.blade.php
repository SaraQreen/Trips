@extends('Admin')

@section('content')

<div class="m-5">

    <table class="pro_log">
        <thead>
        
            <tr>
                <th>Package ID</th>
                <th>Start Point</th>
                <th>End Point</th>
                <th>Weight</th>
                <th>Width</th>
                <th>height</th>
                <th>length</th>
                <th>Trip Cost</th>
                <th>Receiver Name</th>
                <th>Receiver Phone</th>
                <th>Sender ID</th>
                <th>Trip ID</th>
                <th>Package Type</th>


            </tr>
        </thead>
        <tbody>
        @foreach($packages as $package)
            <tr>
                <td>{{$package->package_id}}</td>
                <td>{{$package->start_point_longitude}}</td>
                <td>{{$package->end_point_longitude}}</td>
                <td>{{$package->weight}}</td>
                <td>{{$package->width}}</td>
                <td>{{$package->height}}</td>
                <td>{{$package->length}}</td>
                <td>{{$package->trip_cost}}</td>
                <td>{{$package->receiver_name}}</td>
                <td>{{$package->receiver_phone}}</td>
                <td>{{$package->sender_id}}</td>
                <td>{{$package->trip_id}}</td>
                <td>{{$package->package_type_id}}</td>

            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection