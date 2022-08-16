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
        <td>{{$package_type->name}}</td>
        <td style="text-align: center;">

          <a href='#'>
            <i onclick="getPackage_typeDetails('{{$package_type->package_type_id}}')" data-target="#editModal" data-toggle="modal" class="fa fa-edit blue"></i>
          </a>
          /
          <a href="#delModal_pac" data-toggle="modal">
            <i onclick="opendel_pac('{{$package_type->package_type_id}}')" class="fa fa-trash danger"></i>
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
        <td style="text-align: center;">

          <a href='#'>
            <i onclick="getVehicle_typeDetails('{{$vehicle_type->vehicle_type_id}}')" data-target="#editvehicleModal" data-toggle="modal" class="fa fa-edit blue"></i>
          </a>
          /
          <a href="#delModal_vec" data-toggle="modal">
            <i onclick="opendel_vec('{{$vehicle_type->vehicle_type_id}}')" class="fa fa-trash danger"></i>
          </a>


        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>

<div class="container p-4 mt-3 mb-3">
  <h3>Prices</h3>

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
        <td>{{$price->name}}</td>
        <td>{{$price->p4km}}</td>
        <td>{{$price->p4kg}}</td>
        <td style="text-align: center;">
          <a href='#'>
            <i onclick="getPriceDetails('{{$price->price_id}}')" data-target="#editpriceModal" data-toggle="modal" class="fa fa-edit blue"></i>
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
            <input id="package_type_name" type="text" class="form-control @error('name') is-invalid @enderror" name="package_type_name" value="{{ old('name') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>


          <div class="modal-footer justify-content-center">
            <a id="save_package_type" class="btn btn-admin-form">
              {{ __('Save') }}
            </a>


          </div>
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

        <h2 class="modal-title" id="editModalLabel">Edit Package Type </h2>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <form class="form needs-validation p-1" novalidate>
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="package_type_id" id="package_type_id_edit" value="{{$package_type->package_type_id}}" />

            <label for="name">{{ __('Name') }}</label>
            <input id="package_type_name_edit" type="text" class="form-control @error('name') is-invalid @enderror" name="package_type_name" value="{{ old('name') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <div class="modal-footer justify-content-center">

            <a id="edit_package_type" onclick="edit_pack()" class="btn btn-admin-form">
              {{ __('Edit') }}
            </a>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>


<!-- del pac type Modal -->
<div id="delModal_pac" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h4>Are you sure?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete this package type? This process cannot be undone.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <form>
          @csrf

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button onclick="deletePackage_type()" class="btn btn-danger">Delete</button>
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

          <div class="form-group">

            <label for="name">{{ __('Price Per KM') }}</label>
            <input id="Price_Per_KM" type="text" class="form-control @error('Price_Per_KM') is-invalid @enderror" name="Price_Per_KM" value="{{ old('Price_Per_KM') }}" required pattern="[0-9]{4,}" title="only numbers are allowed" autocomplete="name" autofocus>

            @error('Price_Per_KM')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>
          <div class="form-group">


            <label for="name">{{ __('Price Per KG') }}</label>
            <input id="Price_Per_KG" type="text" class="form-control @error('Price_Per_KG') is-invalid @enderror" name="Price_Per_KG" value="{{ old('Price_Per_KG') }}" required pattern="[0-9]{4,}" title="only numbers are allowed" autocomplete="name" autofocus>

            @error('Price_Per_KG')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="modal-footer justify-content-center">


          <a id="save_vehicle_type" class="btn btn-admin-form">
            {{ __('Save') }}
          </a>
        </div>

    </div>
    </form>
  </div>
</div>



<!--Edit vehicle_type Modal-->

<div id="editvehicleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h2 class="modal-title" id="addModalLabel">Edit Vehicle Type </h2>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <form class="form needs-validation p-1" novalidate>
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="vehicle_type_id" id="vehicle_type_id_edit" value="" />

            <label for="name">{{ __('Name') }}</label>
            <input id="vehicle_type_name_edit" type="text" class="form-control @error('name') is-invalid @enderror" name="vehicle_type_name" value="{{ old('name') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <div class="modal-footer justify-content-center">

            <a id="edit_vehicle_type" onclick="edit_vec()" class="btn btn-admin-form">
              {{ __('Edit') }}
            </a>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>


<!-- del vec type Modal -->
<div id="delModal_vec" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h4>Are you sure?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete this package type? This process cannot be undone.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <form>
          @csrf

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button onclick="deleteVehicle_type()" class="btn btn-danger">Delete</button>
        </form>
      </div>
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


              <label for="name">{{ __('Price Per KM') }}</label>
              <input id="Price_Per_KM_edit" type="text" class="form-control @error('Price_Per_KM') is-invalid @enderror" name="Price_Per_KM" value="{{ old('Price_Per_KM') }}" required pattern="[0-9]{4,}" title="only numbers are allowed" autocomplete="name" autofocus>

              @error('Price_Per_KM')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
            <div class="form-group">


              <label for="name">{{ __('Price Per KG') }}</label>
              <input id="Price_Per_KG_edit" type="text" class="form-control @error('Price_Per_KG') is-invalid @enderror" name="Price_Per_KG" value="{{ old('Price_Per_KG') }}" required pattern="[0-9]{4,}" title="only numbers are allowed" autocomplete="name" autofocus>

              @error('Price_Per_KG')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="modal-footer justify-content-center">


            <a id="edit_price" onclick="edit_pri()" class="btn btn-admin-form">
              {{ __('Edit') }}
            </a>
          </div>


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
          'name': $("input[name='package_type_name']").val(),
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
      dataType: 'json',

      success: function(response) {
        var data = response;

        $('#package_type_name_edit').val(data.name);
        $('#id_edit').val(data.package_type_id);

        //$('#editModal').modal('show');

      },

      //var data = response;
      //$.each(data, function(index){
      //  document.getElementById('id_edit').value=data[index].package_type_id;
      //document.getElementById('package_type_name_edit').value=data[index].name;

      //});  

      error: function(rejest) {}

    });
  }
</script>

<script>
  function edit_pack() {

    pac_id = document.getElementById('package_type_id').value;

    $.ajax({
      type: 'get',
      url: "{{ route('package_type.update') }}",
      data: {
        '_token': "{{csrf_token()}}",
        'package_type_id': pac_id,
        'name': $("#package_type_name_edit").val(),
      },
      success: function(data) {
        location.reload();
      },
      error: function(rejest) {}

    });
  }
</script>

<script>
  var pac_id;

  function opendel_pac($id) {

    pac_id = $id;
    //  alert(pac_id);
  }

  function deletePackage_type() {
    var getPackage_typeURL = '{{ route("package_type.delete","package_type_id") }}';
    getPackage_typeURL = getPackage_typeURL.replace("package_type_id", pac_id);
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
        type: 'get',
        url: "{{ route('vehicle_type.store') }}",
        data: {
          '_token': "{{csrf_token()}}",
          'name': $("input[name='vehicle_type_name']").val(),

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
  function getVehicle_typeDetails($id) {
    var getVehicle_typeURL = '{{ route("vehicle_type.show","id") }}';
    getVehicle_typeURL = getVehicle_typeURL.replace("id", $id);
    console.log(getVehicle_typeURL);
    $.ajax({
      type: 'GET',
      url: getVehicle_typeURL,

      success: function(data) {
        $('#vehicle_type_name_edit').val(data.name);
        $('#vehicle_type_id_edit').val(data.vehicle_type_id);

        // $('#editvehicleModal').modal('show');

      },
      error: function(rejest) {}

    });
  }
</script>


<script>
  function edit_vec() {
    vec_id = document.getElementById('vehicle_type_id_edit').value;


    $.ajax({
      type: 'get',
      url: "{{ route('vehicle_type.update') }}",
      data: {
        '_token': "{{csrf_token()}}",
        'vehicle_type_id': vec_id,
        'name': $("#vehicle_type_name_edit").val(),
      },
      success: function(data) {
        location.reload();
      },
      error: function(rejest) {}

    });
  }
</script>

<script>
  var vec_id;

  function opendel_vec($id) {

    vec_id = $id;
  }

  function deleteVehicle_type() {

    var getVehicle_typeURL = '{{ route("vehicle_type.delete","vehicle_type_id") }}';
    getVehicle_typeURL = getVehicle_typeURL.replace("vehicle_type_id", vec_id);

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
  function getPriceDetails($id) {
    var getPriceURL = '{{ route("price.show","id") }}';
    getPriceURL = getPriceURL.replace("id", $id);
    console.log(getPriceURL);
    $.ajax({
      type: 'GET',
      url: getPriceURL,

      success: function(data) {
       
       
        $('#price_id_edit').val(data.price_id);
        $('#Price_Per_KM_edit').val(data.p4km);
        $('#Price_Per_KG_edit').val(data.p4kg);

        // $('#editpriceModal').modal('show');

      },
      error: function(rejest) {}

    });
  }
</script>


<script>
  function edit_pri() {
    pri_id = document.getElementById('price_id_edit').value;

    $.ajax({
      type: 'get',
      url: "{{ route('price.update') }}",
      data: {
        '_token': "{{csrf_token()}}",
        'price_id_edit': pri_id,
        'p4km': $("#Price_Per_KM_edit").val(),
        'p4kg': $("#Price_Per_KG_edit").val(),
      },
      success: function(data) {
        location.reload();
      },
      error: function(rejest) {}

    });

  }
</script>




@endsection