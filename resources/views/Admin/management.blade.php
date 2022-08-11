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
                     <i onclick="getVehicle_typeDetails('{{$package_type->package_type_id}}')" data-target="#editModal" data-toggle="modal" class="fa fa-edit blue"></i>
                   </a>
                 /
                   <a href='#'>
                     <i onclick="deletePackage_type('{{$package_type->package_type_id}}')" class="fa fa-trash danger"></i>
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
                     <i onclick="getVehicle_typeDetails('{{$vehicle_type->vehicle_type_id}}')" data-target="#editvehicleModal" data-toggle="modal" class="fa fa-edit blue"></i>
                </a>
              /
                <a href='#'>
                     <i onclick="deleteVehicle_type('{{$vehicle_type->vehicle_type_id}}')" class="fa fa-trash danger"></i>
                 </a>


                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>

<div class="container p-4 mt-3 mb-3">
    <h3>Prices</h3>
    <div type="button" href="#addpriceModal" data-toggle="modal" data-target="#addpriceModal" class="btn  btn-admin">Add a new Price</div>
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
                       <i onclick="getPriceDetails('{{$price->price_id}}')" data-target="#editpriceModal" data-toggle="modal"  class="fa fa-edit blue"></i>
                    </a>
                  /
                    <a href='#'>
                       <i onclick="deletePrice('{{$price->price_id}}')"  class="fa fa-trash danger"></i>
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
      <form class="form needs-validation p-1" novalidate>
              @csrf
      <div class="modal-body">
        <div class="form-group">
        <input type="hidden" name="package_type_id" id="package_type_id" value="{{$package_type->package_type_id}}" />

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
      </form>
    </div>
  </div>
</div>

  <!--Edit Package_type Modal-->

<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h2 class="modal-title" id="addModalLabel">Edit Package Type </h2>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <form class="form needs-validation p-1" novalidate>
              @csrf
      <div class="modal-body">
        <div class="form-group">
        <input type="hidden" name="package_type_id" id="package_type_id_edit" value="{{$package_type->package_type_id}}" />

          <label for="name">{{ __('Name') }}</label>
          <input id="name_edit" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          </div>

          <a id="edit_package_type" class="btn btn-info">
          {{ __('Edit') }}
        </a>
      </div>
      </form>
        </div>
    </div>
  </div>

</div>

  <!--Add Vehicle_type Modal-->

<div id="addModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h2 class="modal-title" id="addModalLabel2">Add New Vehicle Type </h2>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <form class="form needs-validation p-1" novalidate>
              @csrf
      <div class="modal-body">
        <div class="form-group">
        <input type="hidden" name="vehicle_type_id" id="vehicle_type_id" value="{{$vehicle_type->vehicle_type_id}}" />

          <label for="name">{{ __('Name') }}</label>
          <input id="vehicle_type_name" type="text" class="form-control @error('name') is-invalid @enderror" name="vehicle_type_name" value="{{ old('name') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          </div>

          <a id="save_vehicle_type" class="btn btn-info">
          {{ __('Save') }}
        </a>
      </div>
      </form>
        </div>
    </div>
  </div>
</div>

<!--Edit vehicle_type Modal-->

<div id="editvehicleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h2 class="modal-title" id="addModalLabel">Edit Package Type </h2>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <form class="form needs-validation p-1" novalidate>
              @csrf
      <div class="modal-body">
        <div class="form-group">
        <input type="hidden" name="vehicle_type_id" id="vehicle_type_id_edit" value="{{$vehicle_type->vehicle_type_id}}" />

          <label for="name">{{ __('Name') }}</label>
          <input id="name_edit" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          </div>

          <a id="edit_vehicle_type" class="btn btn-info">
          {{ __('Edit') }}
        </a>
      </div>
      </form>
        </div>
    </div>
  </div>

</div>

  <!--Add price Modal-->

<div id="addpriceModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h2 class="modal-title" id="addModalLabel">Add New Price </h2>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <form class="form needs-validation p-1" novalidate>
              @csrf
      <div class="modal-body">
        <div class="form-group">
        <input type="hidden" name="price_id" id="price_id" value="{{$price->price_id}}" />

        <div class="form-group">
            <label>Vehicle Type</label>
            <select name="vehicle_type" id="vehicle_type" class="form-select" required>
              @foreach($vehicle_types as $vehicle_type)
              <option>{{$vehicle_type->name}}</option>
              @endforeach
            </select>


          </div>


          <label for="name">{{ __('Price Per KM') }}</label>
          <input id="Price_Per_KM" type="text" class="form-control @error('Price_Per_KM') is-invalid @enderror" name="Price_Per_KM" value="{{ old('Price_Per_KM') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

          @error('Price_Per_KM')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <label for="name">{{ __('Price Per KG') }}</label>
          <input id="Price_Per_KG" type="text" class="form-control @error('Price_Per_KG') is-invalid @enderror" name="Price_Per_KG" value="{{ old('Price_Per_KG') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

          @error('Price_Per_KG')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          </div>

          <a id="save_price" class="btn btn-info">
          {{ __('Save') }}
        </a>

        </div>
      </form>
    </div>
  </div>
</div>

<!--Edit price Modal-->

<div id="editpriceModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h2 class="modal-title" id="addModalLabel">Edit Price </h2>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <form class="form needs-validation p-1" novalidate>
              @csrf
      <div class="modal-body">
        <div class="form-group">
        <input type="hidden" name="price_id" id="price_id_edit" value="{{$price->price_id}}" />

        <div class="form-group">
            <label>Vehicle Type</label>
            <select name="vehicle_type" id="vehicle_type_edit" class="form-select" required>
              @foreach($vehicle_types as $vehicle_type)
              <option>{{$vehicle_type->name}}</option>
              @endforeach
            </select>


          </div>


          <label for="name">{{ __('Price Per KM') }}</label>
          <input id="Price_Per_KM_edit" type="text" class="form-control @error('Price_Per_KM') is-invalid @enderror" name="Price_Per_KM" value="{{ old('Price_Per_KM') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

          @error('Price_Per_KM')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <label for="name">{{ __('Price Per KG') }}</label>
          <input id="Price_Per_KG_edit" type="text" class="form-control @error('Price_Per_KG') is-invalid @enderror" name="Price_Per_KG" value="{{ old('Price_Per_KG') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

          @error('Price_Per_KG')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          </div>

          <a id="edit_price" class="btn btn-info">
          {{ __('Edit') }}
        </a>

        </div>
      </form>
    </div>
  </div>
</div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $(document).on('click', '#save_package_type', function() {

      $.ajax({
        type: 'POST',
        url: "{{ route('package_type.store') }}",
        data: {
          '_token': "{{csrf_token()}}",
          'name': $("input[name='name']").val(),
               },
        success: function(data) {
          location.reload();
        },
        error: function(rejest) {}

      });
    });


  });
</script>

<script>
  function getPackage_typeDetails($id) {
    var getPackage_typeURL = '{{ route("package_type.show","id") }}';
    getPackage_typeURL = getPackage_typeURL.replace("id", $id);
    console.log(getPackage_typeURL);
    $.ajax({
      type: 'GET',
      url: getPackage_typeURL,

      success: function(data) {
        $('#name_edit').val(data.package_type.name);
        $('#id_edit').val(data.package_type.package_type_id);

         //$('#editModal').modal('show');

      },
      error: function(rejest) {}

    });
  }
</script>

<script>
  $(document).ready(function() {
    $(document).on('click', '#edit_Package_type', function() {

      $.ajax({
        type: 'POST',
        url: "{{ route('package_type.update') }}",
        data: {
          '_token': "{{csrf_token()}}",
          'package_type_id': $("#package_type_id_edit").val(),
          'name': $("#name_edit").val(),
        },
        success: function(data) {
          location.reload();
        },
        error: function(rejest) {}

      });
    });


  });
</script>

<script>
  function deletePackage_type($id) {
    var getPackage_typeURL = '{{ route("package_type.delete","package_type_id") }}';
    getPackage_typeURL = getPackage_typeURL.replace("package_type_id", $id);
    console.log(getPackage_typeURL);
    $.ajax({
      type: 'GET',
      url: getPackage_typeURL,
      success: function(data) {
        location.reload();
      },
      error: function(rejest) {}

    });
  }
</script>


<script>
  $(document).ready(function() {
    $(document).on('click', '#save_vehicle_type', function() {

      $.ajax({
        type: 'POST',
        url: "{{ route('vehicle_type.store') }}",
        data: {
          '_token': "{{csrf_token()}}",
          'name': $("input[name='vehicle_type_name']").val(),
               },
        success: function(data) {
          location.reload();
        },
        error: function(rejest) {}

      });
    });


  });
</script>

<script>
  function getVehicle_typeDetails($id) {
    var getVehicle_typeURL = '{{ route("vehicle_type.show","id") }}';
    getVehicle_typeURL = getVehicle_typeURL.replace("id", $id);
    console.log(getVehicle_typeURL);
    $.ajax({
      type: 'GET',
      url: getVehicle_typeURL,

      success: function(data) {
        $('#name_edit').val(data.vehicle_type.name);
        $('#id_edit').val(data.vehicle_type.vehicle_type_id);

        // $('#editvehicleModal').modal('show');

      },
      error: function(rejest) {}

    });
  }
</script>


<script>
  $(document).ready(function() {
    $(document).on('click', '#edit_vehicle_type', function() {

      $.ajax({
        type: 'POST',
        url: "{{ route('vehicle_type.update') }}",
        data: {
          '_token': "{{csrf_token()}}",
          'vehilce_type_id': $("#vehicle_type_id_edit").val(),
          'name': $("#name_edit").val(),
        },
        success: function(data) {
          location.reload();
        },
        error: function(rejest) {}

      });
    });


  });
</script>

<script>
  function deleteVehicle_type($id) {
    var getVehicle_typeURL = '{{ route("vehicle_type.delete","vehicle_type_id") }}';
    getVehicle_typeURL = getVehicle_typeURL.replace("vehicle_type_id", $id);
    console.log(getVehicle_typeURL);
    $.ajax({
      type: 'GET',
      url: getVehicle_typeURL,
      success: function(data) {
        location.reload();
      },
      error: function(rejest) {}

    });
  }
</script>

<script>
  $(document).ready(function() {
    $(document).on('click', '#save_price', function() {

      $.ajax({
        type: 'POST',
        url: "{{ route('price.store') }}",
        data: {
          '_token': "{{csrf_token()}}",
          'vehicle_type': $("input[name='vehicle_type']").val(),
          'Price_Per_KM': $("input[name='Price_Per_KM']").val(),
          'Price_Per_KG': $("input[name='Price_Per_KG']").val(),
               },
        success: function(data) {
          location.reload();
        },
        error: function(rejest) {}

      });
    });


  });
</script>

<script>
  function getPriceDetails($id) {
    var getPriceURL = '{{ route("price.show","id") }}';
    getPriceURL = getPriceURL.replace("id", $id);
    console.log(getPriceURL);
    $.ajax({
      type: 'GET',
      url: getPriceURL,

      success: function(data) {
        $('#vehicle_type_edit').val(data.price.vehicle_type_id);
        $('#price_id_edit').val(data.price.price_id);
        $('#Price_Per_KM_edit').val(data.price.p4km);
        $('#Price_Per_KG_edit').val(data.price.p4kg);

        // $('#editpriceModal').modal('show');

      },
      error: function(rejest) {}

    });
  }
</script>


<script>
  $(document).ready(function() {
    $(document).on('click', '#edit_price', function() {

      $.ajax({
        type: 'POST',
        url: "{{ route('price.update') }}",
        data: {
          '_token': "{{csrf_token()}}",
          'vehilce_type_id': $("#vehicle_type_id_edit").val(),
          'p4km': $("#Price_Per_KM_edit").val(),
          'p4kg': $("#Price_Per_KG_edit").val(),
        },
        success: function(data) {
          location.reload();
        },
        error: function(rejest) {}

      });
    });


  });
</script>

<script>
  function deletePrice($id) {
    var getPriceURL = '{{ route("price.delete","price_id") }}';
    getPriceURL = getPriceURL.replace("price_id", $id);
    console.log(getPriceURL);
    $.ajax({
      type: 'GET',
      url: getPriceURL,
      success: function(data) {
        location.reload();
      },
      error: function(rejest) {}

    });
  }
</script>


@endsection

