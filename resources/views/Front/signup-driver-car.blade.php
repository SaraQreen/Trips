<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Signup-driver-car</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">


  <!-- Bootstrap css files -->
  <link rel="stylesheet" href="/assets/css/bootstrap.css">



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

      <div class="container">
        <form class="form needs-validation" novalidate>
          <div class="form-group">
            <label for="InputEmail">Brand</label>
            <input type="text" class="form-control" id="Input" aria-describedby="Help" placeholder="eg. KIA,BMW,Audi " pattern="[A-Za-z].{2,}" required title="only letters are allowed">


            <div class="invalid-feedback">
              Please provide a valid Brand.
            </div>
          </div>


          <div class="form-group">
            <label for="InputEmail">Model</label>
            <input type="text" class="form-control" id="Input" aria-describedby="Help" placeholder="eg. KIA cerato " pattern="[A-Za-z].{2,}" required title="only letters are allowed">


            <div class="invalid-feedback">
              Please provide a valid Model.
            </div>

          </div>

          <div class="form-group">
            <label for="InputEmail">License Number</label>
            <input type="text" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="eg. 231456" required pattern="[0-9]{6,}" title="only numbers allowed">


            <div class="invalid-feedback">
              Please provide a valid License Number.
            </div>


          </div>

          <div class="form-group">
            <label for="InputEmail">Vehicle Color</label>
            <input type="color" class="form-control" value="#aa1313" required title="Enter Vehicle Color">


            <div class="invalid-feedback">
              Please provide a valid Vehicle Color .
            </div>

          </div>

          <div class="form-group">
            <label for="InputEmail">Passenger Count</label>
            <select class="form-select" required title="Select Passenger Count">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
            </select>

            <div class="invalid-feedback">
              Please provide a valid Passenger Count.
            </div>
          </div>

          <div class="form-group">
            <label>Vehicle Type</label>
            <select class="form-select" required title="Select Vehicle Type">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select>

            <div class="invalid-feedback">
              Please provide a valid Vehicle Type.
            </div>


          </div>

          <div class="form-group">
            <label for="InputEmail">Max Load Size</label>
            <input type="text" class="form-control" id="Input" aria-describedby="Help" placeholder="" required pattern="[a-z0-9._%+-]{4,}" title="numbers and letters are allowed">

            <div class="invalid-feedback">
              Please provide a valid Size.
            </div>


          </div>

          <div class="form-group">
            <label for="InputEmail">Max Load Weight</label>
            <input type="text" class="form-control" id="Input" aria-describedby="Help" placeholder=" " required pattern="[a-z0-9._%+-]{4,}" title="numbers and letters are allowed">

            <div class="invalid-feedback">
              Please provide a valid Weight.
            </div>

          </div>



          <div class=" signup-group">
            <button type="submit" class="btn-signup btn btn-primary ">Signup</button>
          </div>



        </form>
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


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>