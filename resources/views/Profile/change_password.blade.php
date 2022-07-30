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

  <!-- Google Fonts -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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

    <section class="profile">

      <div class="container">
        <div class="row">

         
            <div class="panel panel-default">
              <h2>Change password</h2>

              <div class="panel-body">
                @if (session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif
                @if($errors)
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @endif
                <form class="form" method="POST" action="{{ route('changePasswordPost') }}">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                    <label for="current-password" class="control-label">Current Password</label>
                    <input id="current-password" type="password" class="form-control" name="current-password" required>

                    @if ($errors->has('current-password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('current-password') }}</strong>
                    </span>
                    @endif

                  </div>

                  <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                    <label for="new-password" class=" control-label">New Password</label>

                    <input id="new-password" type="password" class="form-control" name="new-password" required>

                    @if ($errors->has('new-password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('new-password') }}</strong>
                    </span>
                    @endif

                  </div>

                  <div class="form-group">
                    <label for="new-password-confirm" class="control-label">Confirm New Password</label>

                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>

                  </div>

                  <div class="form-group">
                    <div class=" profile-group">
                      <button type="submit" class="btn btn-profile">
                        Change Password
                      </button>
                    </div>
                  </div>
                </form>
              </div>
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



</body>

</html>