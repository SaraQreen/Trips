<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Signup_Driver</title>
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
        <form class=" form needs-validation" novalidate action="{{ url('/home/signup_driver_car') }}">
          <div class="form-group">
            <label for="InputUserName">User Name</label>
            <input type="text" class="form-control" id="InputUserName" aria-describedby="Help" placeholder="Enter " pattern="[A-z]{3,}" title="only letters are allowed" required>

            <div class="invalid-feedback">
              Please provide a valid name.
            </div>
          </div>

          <div class="form-group">
            <label for="InputFullName">Full Name</label>
            <input type="text" class="form-control" id="InputFullName" aria-describedby="Help" placeholder="Enter " pattern="[A-z ]{3,}" title="only letters are allowed" required>

            <div class="invalid-feedback">
              Please provide a valid name.
            </div>
          </div>

          <div class="form-group">
            <label for="InputEmail">Email address</label>
            <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required title="someemail@mail.something">

            <div class="invalid-feedback">
              Please provide a valid email.
            </div>
          </div>

          <div class="form-group">
            <label for="InputPhone">Phone</label>
            <input type="text" class="form-control" id="InputPhone" aria-describedby="Help" placeholder="Enter " required pattern="[0-9]{6,}" title="only numbers allowed">

            <div class="invalid-feedback">
              Please provide a valid phone.
            </div>
          </div>


          <div class="form-group">
            <label for="InputIDPhoto">ID Photo</label>
            <input type="file" class="form-control" id="InputIDPhoto" aria-describedby="Help" placeholder="Enter " required>

            <div class="invalid-feedback">
              Please provide a valid photo.
            </div>
          </div>

          <div class="form-group">
            <label for="InputPassword">Password</label>
            <input type="password" class="form-control" id="InputPassword" placeholder="Password" pattern=".{6,}" required title="Password should have at least 6 or more characters">

            <div class="invalid-feedback">
              Please provide a valid password.
            </div>
          </div>

          <div class=" signup-group">
            <button type="submit" class="btn-signup-car btn  ">Next</button>

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

</body>

</html>