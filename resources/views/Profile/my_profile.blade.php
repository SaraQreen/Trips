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
        <div class="pro_info">
          <p>User Name: {{Auth::user()->user_name}}</p>
          <p>Full Name: {{Auth::user()->full_name}}</p>
          <p>Phone: {{Auth::user()->phone}}</p>
          <p>Email: {{Auth::user()->email}}</p>

        </div>


        <div class="profile-group">
          <a href="#editModal" data-toggle="modal" class="btn-profile btn ">Edit My Info</a>
          <a href="{{route('my_profile/log')}}" class="btn-profile btn ">My Trips Log</a>
          <a href="{{route('my_profile/change_password')}}" class="btn-profile btn ">Change password</a>
          <a class="btn-profile-delete btn " href="#delModal" data-toggle="modal">Delete My Account</a>
        </div>
      </div>

      <!-- del Modal -->
      <div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header ">

              <h4>Are you sure?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>Do you really want to delete your account? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
              <form method="POST" action="{{ route('delete_user') }}">
                @csrf
                <input type="text" name="d_id" id="d_id" hidden>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
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
            <div class="modal-body">

              <form method="POST" action="{{ route('update_user') }}">
                @csrf
                <div class="form-group">
                  <label for="name">{{ __('User Name') }}</label>
                  <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{Auth::user()->user_name}}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="user_name" autofocus>

                  @error('user_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror


                </div>

                <div class="form-group">
                  <label for="full_name">{{ __('Full Name') }}</label>
                  <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{Auth::user()->full_name}}" required autocomplete="full_name" pattern="[A-z]{3,}" title="only letters are allowed" autofocus>

                  @error('full_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                </div>

                <div class="form-group">
                  <label for="email">{{ __('Email Address') }}</label>

                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email">

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="phone">{{ __('Phone') }}</label>
                  <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" required pattern="[0-9]{6,}" value="{{Auth::user()->phone}}" title="only numbers of six digits and above are allowed">
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                </div>



            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-commn">Edit</button>
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