@extends('Admin')

@section('content')

<div class="container p-4">
    <h3>Package Types</h3>
    <div href="#addModal" data-toggle="modal" data-target="#addModal" class="btn  btn-admin">Add a new Package Type</div>
    <table class="admin_tb">
        <thead>
            <tr>
                <th>Name</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
        @foreach($packages_type as $package_type)
            <tr>
                <td>{{$package_type->name}} </td>
                <td>

                   <a href='#'>
                     <i  class="fa fa-edit blue"></i>
                   </a>
                 /
                   <a href='#'>
                     <i  class="fa fa-trash danger"></i>
                   </a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>

<div class="container p-4 mt-3">
    <h3>Vehicles Types</h3>
    <div href="#addModal2" data-toggle="modal" data-target="#addModal2" class="btn  btn-admin">Add a new Vehicles Type</div>
    <table class="admin_tb">
        <thead>
            <tr>
                <th>Name</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
        @foreach($vehicle_types as $vehicle_type)
            <tr>
                <td>{{$vehicle_type->name}}</td>
                <td>
                    
                <a href='#'>
                     <i  class="fa fa-edit blue"></i>
                </a>
              /
                <a href='#'>
                     <i  class="fa fa-trash danger"></i>
                 </a>


                </td>
            </tr>
        </tbody>
        @endforeach
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
        @foreach($prices as $price)
            <tr>
                <td>{{$price->vehicle_type_id}}</td>
                <td>{{$price->p4km}}</td>
                <td>{{$price->p4kg}}</td>
                <td>
                    <a href='#'>
                       <i  class="fa fa-edit blue"></i>
                    </a>
                  /
                    <a href='#'>
                       <i  class="fa fa-trash danger"></i>
                    </a>
                   

                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>


<!--Add Package_type Modal-->

<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h2 class="modal-title" id="addModalLabel">Add New Package Type </h2>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name">{{ __('Name') }}</label>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          </div>

          <a id="save_package_type" class="btn btn-info">
          {{ __('Save') }}
        </a>

        </div>
    </div>
  </div>


@endsection