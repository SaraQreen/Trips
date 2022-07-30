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
</head>

<body>


  <!-- ======= Header ======= -->
  @include('includes.header')



  <main id="main">

    <section class="profile">

      <div class="container">
        <h1 class="text-center">My Booked Trip Details</h1>

        <table class="pro_log">
          <h2>Seat reserived trips</h2>
          <thead>
            <tr>
              <th>Trip ID</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Driver's Name</th>
              <th>Seats Reserved</th>
              <th>Start Point</th>
              <th>End Point</th>
              <th>Km Distance</th>
              <th>Cost</th>
              <th>Trip Status</th>
            </tr>
          </thead>
          <tbody>
          @foreach($seats as $seat)
            <tr>  
              <td>{{$seat->trip_id}}</td>
              <td>{{$seat->start_time}}</td>
              <td>{{$seat->end_time}}</td>
              <td>{{$seat->user_name}}</td>
              <td>{{$seat->seats_reserved}}</td>
              <td>{{$seat->id}}</td>
              <td>{{$seat->id}}</td>
              <td>{{$seat->km_distance}}</td>
              <td>{{$seat->trip_cost}}</td>
              <td>{{$seat->name}}</td>
             
            </tr>
            @endforeach
          </tbody>
        </table>
        <br>
        <table class="pro_log">
          <h2>Package reserived trips</h2>
          <thead>
            <tr>
              <th>Trip ID</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Start Point</th>
              <th>End Point</th>
              <th>Driver's Name</th>
              <th>Package weight</th>
              <th>Package size</th>
              <th>Receiver name</th>
              <th>Receiver phone</th>
              <th>Package Type</th>
              <th>Cost</th>
              <th>Trip Status</th>
            </tr>
          </thead>
          <tbody>
          @foreach($packages as $package)
            <tr>  
              <td>{{$package->trip_id}}</td>
              <td>{{$package->start_time}}</td>
              <td>{{$package->end_time}}</td>
              <td></td>
              <td></td>
              <td>{{$package->user_name}}</td>
              <td>{{$package->weight}}</td>
              <td>{{$package->height}}</td>
              <td>{{$package->receiver_name}}</td>
              <td>{{$package->receiver_phone}}</td>
              <td>{{$package->type}}</td>
              <td>{{$package->trip_cost}}</td>
              <td>{{$package->status}}</td>
             
            </tr>
            @endforeach
          </tbody>
        </table>

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