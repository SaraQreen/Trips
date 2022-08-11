@extends('Admin')

@section('content')

<div class="m-5">

  <table class="pro_log">
    <thead>
      <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>License Number</th>
        <th>Color</th>
        <th>Insurance</th>
        <th>Passenger count</th>
        <th>Vehicle Type</th>
        <th>Max Load Size</th>
        <th>Max Load Weight</th>
        <th>Operations </th>
      </tr>
    </thead>
    <tbody>
      @foreach($vehicles as $vehicle)
      <tr>

        <td>{{$vehicle->brand}}</td>
        <td>{{$vehicle->model}}</td>
        <td>{{$vehicle->license_num}}</td>
        <td>{{$vehicle->color}}</td>
        <td>{{$vehicle->insurance_type}}</td>
        <td>{{$vehicle->passenger_count}}</td>
        <td>{{$vehicle->vehicle_type}}</td>
        <td>{{$vehicle->max_load_size}}</td>
        <td>{{$vehicle->max_load_weight}}</td>
        <td>

        <a href='#'>
            <i onclick="getVehicleDetails('{{$vehicle->vehicle_id}}')" data-target="#editModal" data-toggle="modal" class="fa fa-edit blue"></i>
          </a>
          
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  
                
    <!-- edit Modal -->
   <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header ">

            <h4>Edit Vehicle Infomation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             </div>
             <form class="form needs-validation p-1" novalidate>
              @csrf
           <div class="modal-body">
                 
                <div class="form-group">
                  <label for="brand">Brand</label>
                   <input type="text" name="brand" class="form-control" id="brand_edit" value="{{ old('brand') }}" pattern="[A-Za-z].{2,}" required title="only letters are allowed">

                 <div class="invalid-feedback">
                     Please provide a valid Brand.
                    </div>
                  </div>

                  <input type="hidden" name="vehicle_id" id="vehicle_id_edit" value="{{$vehicle->vehicle_id}}" />

                  <div class="form-group">
                     <label for="model">Model</label>
                     <input type="text" name="model" class="form-control" id="model_edit" value="{{ old('model') }}" pattern="[A-Za-z0-9].{2,}" required title="only numbers and letters are allowed">

                   <div class="invalid-feedback">
                       Please provide a valid Model.
                    </div>
                      </div>

                    <div class="form-group">
                      <label for="license_num">License Number</label>
                      <input type="text" name="license_num" class="form-control" id="license_num_edit" value="{{ old('license_num') }}" required pattern="[0-9]{6,}" title="only numbers allowed">

                    <div class="invalid-feedback">
                       Please provide a valid License Number.
                      </div>
                       </div>

                       <div class="form-group">
                  <label for="insurance_type">Insurance type</label>
                  <div class="form-check" id="insurance_type_edit">
                    @if($vehicle->insurance_type=='FULL')
                    <input class="form-check-input" type="radio" name="insurance_type" value="FULL" id="full" checked>
                    <label class="form-check-label" for="full">
                      Full
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="insurance_type" id="compulsory" value="COMPULSORY">
                    <label class="form-check-label" for="compulsory">
                      Compulsory
                    </label>
                    @else
                    <input class="form-check-input" type="radio" name="insurance_type" value="FULL" id="full">
                    <label class="form-check-label" for="full">
                      Full
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="insurance_type" id="compulsory" value="COMPULSORY" checked>
                    <label class="form-check-label" for="compulsory">
                      Compulsory
                    </label>
                    @endif
                  </div>
                </div>

                       <div class="form-group">
                          <label for="color">Vehicle Color</label>
                          <input type="color" name="color" id="color_edit" class="form-control" value="#aa1313" required title="Enter Vehicle Color">

                          </div>

                       <div class="form-group">
                  <label for="passenger_count">Passenger Count</label>
                  <select name="passenger_count" id="passenger_count_edit" value="{{$vehicle->passenger_count}}" class="form-select" required>

                    @for($i=1;$i<=7;$i++) @if($i==$vehicle->passenger_count)
                      <option value={{$i}} selected>{{$i}}</option>
                      @else
                      <option value={{$i}}>{{$i}}</option>
                      @endif
                      @endfor
                  </select>

                </div>

                <div class="form-group">
                  <label>Vehicle Type</label>
                  <select name="vehicle_type" value="{{$vehicle->vehicle_type}}" id="vehicle_type_edit" class="form-select" required>
                    @foreach($vehicle_types as $vehicle_type)

                    @if($i==$vehicle->passenger_count)
                    <option value="{{$vehicle_type->name}}" selected>{{$vehicle_type->name}}</option>
                    @else
                    <option value="{{$vehicle_type->name}}">{{$vehicle_type->name}}</option>

                    @endif
                    @endforeach
                  </select>


                </div>

              <div class="form-group">
                 <label for="max_load_size">Max Load Size</label>
                 <input type="text" class="form-control" name="max_load_size" id="max_load_size_edit" value="{{ old('max_load_size') }}" required pattern="[0-9]{4,}" title="only numbers are allowed">

              <div class="invalid-feedback">
                Please provide a valid Max Load Size.
              </div>
            </div>

            <div class="form-group">
              <label for="max_load_weight">Max Load Weight</label>
              <input type="text" name="max_load_weight" class="form-control" id="max_load_weight_edit" value="{{ old('max_load_weight') }}" required pattern="[0-9]{4,}" title="only numbers are allowed">

              <div class="invalid-feedback">
                Please provide a valid Max Load Weight.
              </div>
            </div>
            <a id="edit_vehicle" class="btn btn-info">
            {{ __('Edit') }}
            </a>
          </form>
        </div>
      </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
  function getVehicleDetails($id) {
    var getVehicleURL = '{{ route("vehicle.show","id") }}';
    getVehicleURL = getVehicleURL.replace("id", $id);
    console.log(getVehicleURL);
    $.ajax({
      type: 'GET',
      url: getVehicleURL,

      success: function(data) {
        $('#brand_edit').val(data.vehicle.brand);
        $('#model_edit').val(data.vehicle.model);
        $('#license_num_edit').val(data.vehicle.license_num);
        $('#insurance_type_edit').val(data.vehicle.insurance_type);
        $('#color_edit').val(data.vehicle.color);
        $('#vehicle_type_edit').val(data.vehicle.vehicle_type);
        $('#max_load_size_edit').val(data.vehicle.max_load_size);
        $('#max_load_weight_edit').val(data.vehicle.max_load_weight);
        $('#vehicle_id_edit').val(data.vehicle.vehicle_id);

         //('#editModal').modal('show');

      },
      error: function(rejest) {}

    });
  }
</script>

<script>
  $(document).ready(function() {
    $(document).on('click', '#edit_vehicle', function() {

      $.ajax({
        type: 'POST',
        url: "{{ route('vehicle.update') }}",
        data: {
          '_token': "{{csrf_token()}}",
          'vehicle_id': $("#id_edit").val(),
          'brand': $("#brand_edit").val(),
          'model': $("#model_edit").val(),
          'license_num': $("#license_num_edit").val(),
          'insurance_type': $("#insurance_type_edit").val(),
          'color': $("#color_edit").val(),
          'vehicle_type': $("#vehicle_type_edit").val(),
          'max_load_size': $("#max_load_size_edit").val(),
          'max_load_weight': $("#max_load_weight_edit").val()

        },
        success: function(data) {
          location.reload();
        },
        error: function(rejest) {}

      });
    });


  });

</script>


@endsection