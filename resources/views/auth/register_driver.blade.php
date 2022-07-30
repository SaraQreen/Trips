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

  <!-- Bootstrap css files -->



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



  <main id="main">

    <section class="signup">
      <form method="POST" action="{{ route('store_driver') }}" enctype="multipart/form-data">
        @csrf

        <div class="container p-4">

          <h2>Personal Information</h2>
          <div class="form-group">
            <label for="name">{{ __('User Name') }}</label>
            <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="user_name" autofocus>

            @error('user_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror


          </div>

          <div class="form-group">
            <label for="full_name">{{ __('Full Name') }}</label>
            <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" pattern="[A-z]{3,}" title="only letters are allowed" autofocus>

            @error('full_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <div class="form-group">
            <label for="email">{{ __('Email Address') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="phone">{{ __('Phone') }}</label>
            <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" required pattern="[0-9]{6,}" value="{{old('phone')}}" title="only numbers of six digits and above are allowed">
            @error('phone')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <div class="form-group">
            <label for="id_photo">ID Photo</label>
            <input type="file" name="id_photo" class="form-control" id="id_photo" required>


          </div>
          <div class="form-group">
            <label for="license">License</label>
            <input type="file" name="license" class="form-control" id="license" required>


          </div>

          <div class="form-group">
            <label for="password">Password</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" title="Password should have at least 6 or more characters" required pattern=".{6,}" autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>


            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required pattern=".{6,}" title="Password should have at least 6 or more characters" autocomplete="new-password">

          </div>




        </div>
        <br>

        <hr style="opacity: 0;">

        <div class="container p-4">

          <h2>Vehicle Information</h2>
          <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control" id="brand" placeholder="eg. KIA,BMW,Audi " pattern="[A-Za-z].{2,}" required title="only letters are allowed">

          </div>

          <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" id="model" placeholder="eg. KIA cerato " pattern="[A-Za-z0-9].{2,}" required title="only numbers and letters are allowed">


          </div>

          <div class="form-group">
            <label for="license_num">License Number</label>
            <input type="text" name="license_num" class="form-control" id="license_num" placeholder="eg. 231456" required pattern="[0-9]{6,}" title="only numbers allowed">

          </div>

          <div class="form-group">
            <label for="insurance_type">Insurance type</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="insurance_type" value="Full" id="full">
              <label class="form-check-label" for="full">
                Full
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="insurance_type" id="compulsory" value="Compulsory" checked>
              <label class="form-check-label" for="compulsory">
                Compulsory
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="color">Vehicle Color</label>
            <input type="color" name="color" id="color" class="form-control" value="#aa1313" required title="Enter Vehicle Color">


          </div>

          <div class="form-group">
            <label for="passenger_count">Passenger Count</label>
            <select name="passenger_count" id="passenger_count" class="form-select" required>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
            </select>

          </div>

          <div class="form-group">
            <label>Vehicle Type</label>
            <select name="vehicle_type" id="vehicle_type" class="form-select" required>
              @foreach($vehicle_types as $vehicle_type)
              <option>{{$vehicle_type->name}}</option>
              @endforeach
            </select>


          </div>

          <div class="form-group">
            <label for="max_load_size">Max Load Size</label>
            <input type="text" class="form-control" name="max_load_size" id="max_load_size" placeholder="Liter" required pattern="[0-9]{4,}" title="only numbers are allowed">

          </div>

          <div class="form-group">
            <label for="max_load_weight">Max Load Weight</label>
            <input type="text" name="max_load_weight" class="form-control" id="max_load_weight" placeholder=" KG" required pattern="[0-9]{4,}" title="only numbers are allowed">

          </div>

          <div class=" signup-group">
            <button type="submit" class="btn-signup btn">
              {{ __('Register') }}
            </button>
          </div>



        </div>
      </form>
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

</body>

</html>