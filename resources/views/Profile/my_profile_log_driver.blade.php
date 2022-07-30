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
        <div class="d-flex justify-content-between mb-2 pro_trip">
          <span class="h1">My Trips Details</span>
          <a href="{{route('my_profile/log')}}" class="btn-profile btn " style="margin: 0px;">booked trips details</a>

        </div>


        <table class="pro_log">
          <thead>
            <tr>
              <th>Trip Status</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Package Count</th>
              <th>Seats Reserved</th>
              <th>Start Point</th>
              <th>End Point</th>
              <th>Km Distance</th>
              <th>Kg Weight</th>
              <th>Packages Profit</th>
              <th>Passengers Profit</th>
              <th>Total Profit</th>
            </tr>
          </thead>
          <tbody>
            @foreach($trips as $trip)
            <tr>
              <td>{{$trip->status}}</td>
              <td>{{$trip->start_time}}</td>
              <td>{{$trip->end_time}}</td>
              <td>{{$trip->counts}}</td>
              <td>{{$trip->seats}}</td>
              <td></td>
              <td></td>
              <td>{{$trip->distance}}</td>
              <td>{{$trip->weight}}</td>
              <td>{{$trip->pac_cost}}</td>
              <td>{{$trip->p_cost}}</td>
              <td>{{$trip->cost}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>


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