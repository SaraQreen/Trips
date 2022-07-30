<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Book-Trip-Package-form</title>
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
</head>

<body>

  <!-- ======= Header ======= -->
  @include('includes.header')


  <main id="main">

    <section class="trip">

      <div class="container">
        <div class="trip_info">




          <div class="section-title">
            <h2>Enter Your Trip Details </h2>

          </div>

          <form class="form needs-validation" novalidate>
            <div class="form-group">
              <label for="InputEmail">Receiver Name</label>
              <input type="text" class="form-control" id="Input" aria-describedby="Help" placeholder="" pattern="[A-Za-z].{2,}" required title="only letters are allowed">

              <div class="invalid-feedback">
                Please provide a valid Name.
              </div>
            </div>

            <div class="form-group">
              <label for="InputEmail">Receiver Phone</label>
              <input type="text" class="form-control" id="Input" aria-describedby="Help" placeholder="" required pattern="[0-9]{6,}" title="only numbers allowed">

              <div class="invalid-feedback">
                Please provide a valid Phone.
              </div>


            </div>

            <div class="form-group row">
              <div class="col-4">
                <label for="InputEmail">
                  Click on the map to locate your end and start point</label>
              </div>

              <div class="col-3"></div>
              <div class="col-5">
                <img src="/assets/img/map.jfif" class="img-fluid" height="200" width="200">
              </div>
            </div>


            <input type="text" hidden="true">
            <input type="text" hidden="true">

            <div class="form-group">
              <label for="InputEmail">Package Height</label>
              <input type="text" class="form-control" id="Input" aria-describedby="Help" placeholder="" required pattern="[0-9]{1,}" title="only numbers allowed">


              <div class="invalid-feedback">
                Please provide a valid Package Height.
              </div>


            </div>
            <div class="form-group">
              <label for="InputEmail">Package Length</label>
              <input type="text" class="form-control" id="Input" aria-describedby="Help" placeholder="" required pattern="[0-9]{1,}" title="only numbers allowed">

              <div class="invalid-feedback">
                Please provide a valid Package Length.
              </div>


            </div>

            <div class="form-group">
              <label for="InputEmail">Package Width </label>
              <input type="text" class="form-control" id="Input" aria-describedby="Help" placeholder="" required pattern="[0-9]{1,}" title="only numbers allowed">

              <div class="invalid-feedback">
                Please provide a valid Package Width.
              </div>


            </div>

            <div class="form-group">
              <label for="InputEmail">Package Weight</label>
              <input type="text" class="form-control" id="Input" aria-describedby="Help" placeholder=" " required pattern="[0-9]{1,}" title="only numbers allowed">

              <div class="invalid-feedback">
                Please provide a valid Package Weight.
              </div>



            </div>

            <div class="form-group row">
              <div class="col-sm-5 col-xs-5">
                <label for="InputEmail">Package Type</label>
              </div>

              <div class="col-sm-6 col-xs-6">
                <select class="form-select" required title="Select Package Type">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                </select>
              </div>

            </div>


            <div class=" signup-group">
              <button type="submit" class="btn-trip btn btn-primary ">Book The Trip</button>
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
      </div>
    </section>





  </main>
  <!-- End #main -->


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