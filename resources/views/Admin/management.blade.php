@extends('Admin')

@section('content')

<div class="container p-4">
    <h3>Package Types</h3>
    <div type="button" class="btn  btn-admin">Add a new Package Type</div>
    <table class="admin_tb">
        <thead>
            <tr>
                <th>Name</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="container p-4 mt-3">
    <h3>Vehicles Types</h3>
    <div type="button" class="btn  btn-admin">Add a new Vehicles Type</div>
    <table class="admin_tb">
        <thead>
            <tr>
                <th>Name</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="container p-4 mt-3 mb-3">
    <h1>Prices</h1>
    <div type="button" class="btn  btn-admin">Add a new Price</div>
    <table class="admin_tb">
        <thead>
            <tr>
                <th>Vehicle Type</th>
                <th>Price Per KM</th>
                <th>Price Per KG</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection