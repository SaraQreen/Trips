<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ride Share</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Google Fonts -->



  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v4.8.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <!-- ======= Header ======= -->
  @include('includes.header')


  <style>
    .dot {
      height: 25px;
      width: 25px;
      background-color: <?php echo $vehicle->color?>;
      display: inline-block;
    }
  </style>
  <main id="main">

    <section class="profile">

      <div class="container">
        <div class="pro_info">
        @if (Session::has('success'))
          <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
          </div>
          @endif
          
          <p>Brand:{{$vehicle->brand}}</p>
          <p>Model:{{$vehicle->model}}</p>
          <p>Lisence Number:{{$vehicle->license_num}}</p>
          <p>Color:{{$vehicle->color}} <span class="dot"> </span></p>
          <p>Insurance type:{{$vehicle->insurance_type}}</p>
          <p>Passenger Count:{{$vehicle->passenger_count}}</p>
          <p>vehicle_type:{{$vehicle->vehicle_type}}</p>
          <p>Max Load Size:{{$vehicle->max_load_size}}</p>
          <p>Max Load Weight:{{$vehicle->max_load_weight}}</p>
        </div>


        <div class="profile-group">
          <a href="#editModal" data-toggle="modal" class="btn-profile btn ">Edit My Vehicle Info</a>

        </div>
      </div>

      <!-- edit Modal -->
      <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header ">

              <h4>Edit Infomation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form p-1" method="POST" action="{{ route('update_vehicle') }}">
              @csrf
              <div class="modal-body">

                <input type="text" name="u_id" id="u_id" value="{{$vehicle->vehicle_id}}" hidden>

                <div class="form-group">
                  <label for="brand">Brand</label>
                  <input type="text" name="brand" class="form-control" id="brand" value="{{$vehicle->brand}}" placeholder="eg. KIA,BMW,Audi " pattern="[A-Za-z].{2,}" required title="only letters are allowed">

                </div>

                <div class="form-group">
                  <label for="model">Model</label>
                  <input type="text" name="model" class="form-control" id="model" value="{{$vehicle->model}}" placeholder="eg. KIA cerato " pattern="[A-Za-z0-9].{2,}" required title="only numbers and letters are allowed">


                </div>

                <div class="form-group">
                  <label for="license_num">License Number</label>
                  <input type="text" name="license_num" value="{{$vehicle->license_num}}" class="form-control  @error('license_num') is-invalid @enderror" id="license_num" placeholder="eg. 231456" required pattern="[0-9]{6,}" title="only numbers allowed">
                  @error('license_num')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="insurance_type">Insurance type</label>
                  <div class="form-check">
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
                  <input type="color" name="color" id="color" class="form-control" value="{{$vehicle->color}}" required title="Enter Vehicle Color">


                </div>

                <div class="form-group">
                  <label for="passenger_count">Passenger Count</label>
                  <select name="passenger_count" id="passenger_count" value="{{$vehicle->passenger_count}}" class="form-select" required>

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
                  <select name="vehicle_type" value="{{$vehicle->vehicle_type}}" id="vehicle_type" class="form-select" required>
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
                  <input type="text" class="form-control" value="{{$vehicle->max_load_size}}" name="max_load_size" id="max_load_size" placeholder="Liter" required pattern="[0-9]{4,}" title="only numbers are allowed">

                </div>

                <div class="form-group">
                  <label for="max_load_weight">Max Load Weight</label>
                  <input type="text" name="max_load_weight" value="{{$vehicle->max_load_weight}}" class="form-control" id="max_load_weight" placeholder=" KG" required pattern="[0-9]{4,}" title="only numbers are allowed">

                </div>


              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-commn">Edit</button>

              </div>
            </form>
          </div>
        </div>
      </div>

    </section>





  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  @include('includes.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/purecounter/purecounter.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>


  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
</body>

</html>