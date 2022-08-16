@extends('Admin')

@section('content')

<div class="m-5">

    <table class="pro_log">
        <thead>
        
            <tr>
                <th>Weight</th>
                <th>Width</th>
                <th>Height</th>
                <th>Start Address</th>
                <th>End Address</th>
                <th>Trip Cost</th>
                <th>Receiver Name</th>
                <th>Receiver Phone</th>
                <th>Package Type</th>
                <th>Trip Status</th>
                


            </tr>
        </thead>
        <tbody>
        @foreach($packages as $package)
            <tr>
                <td>{{$package->weight}}</td>
                <td>{{$package->width}}</td>
                <td>{{$package->height}}</td>
                <td>{{$package->start_address}}</td>
                <td>{{$package->end_address}}</td>
                <td>{{$package->trip_cost}}</td>
                <td>{{$package->receiver_name}}</td>
                <td>{{$package->receiver_phone}}</td>
                <td>{{$package->package_type}}</td>
                <td>{{$package->trip_status}}</td>
                

            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection