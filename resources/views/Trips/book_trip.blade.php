<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />

  <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ride Share</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Favicons -->

  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">




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

    <section class="trip_book">



      <div class="section-title">
        <h2>Choose a Trip </h2>
      </div>

      <form class="form container">
        <div class="form-group row">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-1 ">
            <label for="filter" class="m-1">Filter By</label>
          </div>

          <div class="col-sm-1">
            <select class="form-select " id="filter">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
            </select>
          </div>

          <div class="col-sm-1"></div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col-sm-3">

          </div>

        </div>
      </form>


      <hr class="solid">

      <div class="row ml-4 mr-4">
        @foreach($trips as $trip)
        <div type="button" class="trip_card col-md-6 col-xl-3 col-lg-4 " data-toggle="modal" data-target="#exampleModalCenter">
          <div class="card p-2" style="width: 18rem;  margin: auto;">
            <div id="map2" class="card-img-top  rounded-top" style=" width:16rem; height:16rem;align-self: center;">
            </div>

            <div class="card-body">
              <p class="card-text card-icon">

                <i class="material-icons card-icon">location_on</i> <span></span> Destination:</span><br>
                <i class="material-icons card-icon">access_time</i> <span>Start Time:</span><br>
                <i class="material-icons card-icon">directions_car</i> <span>Vehicle type:</span><br>
              </p>
            </div>
          </div>
        </div>
        @endforeach
        <div class="trip_card col-md-6 col-xl-3 col-lg-4 ">
          <div class="card p-2" style="width: 18rem;  margin: auto;">
            <img class="card-img-top  rounded-top" src="/assets/img/map.jfif" width="16rem" height="200rem" alt="Card image cap">
            <div class="card-body">
              <p class="card-text card-icon">

                <i class="material-icons card-icon">location_on</i> <span></span> Destination:</span><br>
                <i class="material-icons card-icon">access_time</i> <span>Start Time:</span><br>
                <i class="material-icons card-icon">directions_car</i> <span>Vehicle type:</span><br>
              </p>
            </div>
          </div>
        </div>

        <div class="trip_card col-md-6 col-xl-3 col-lg-4 ">
          <div class="card p-2" style="width: 18rem;  margin: auto;">
          <div id="map2" class="card-img-top  rounded-top" style=" width:16rem; height:16rem;align-self: center;">
            </div>

            <div class="card-body">
              <p class="card-text card-icon">

                <i class="material-icons card-icon">location_on</i> <span></span> Destination:</span><br>
                <i class="material-icons card-icon">access_time</i> <span>Start Time:</span><br>
                <i class="material-icons card-icon">directions_car</i> <span>Vehicle type:</span><br>
              </p>
            </div>
          </div>
        </div>

        <div class="trip_card col-md-6 col-xl-3 col-lg-4 ">
          <div class="card p-2" style="width: 18rem;  margin: auto;">
            <img class="card-img-top  rounded-top" src="/assets/img/map.jfif" width="16rem" height="200rem" alt="Card image cap">
            <div class="card-body">
              <p class="card-text card-icon">

                <i class="material-icons card-icon">location_on</i> <span></span> Destination:</span><br>
                <i class="material-icons card-icon">access_time</i> <span>Start Time:</span><br>
                <i class="material-icons card-icon">directions_car</i> <span>Vehicle type:</span><br>
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img class="rounded" src="/assets/img/map.jfif" width="100%" height="250rem" alt="Card image cap">
              <div class="row mt-4">
                <div class="col-md-6 col-sm-12">
                  <p>Driver's name:</p>
                  <p>Vehicle Type:</p>
                  <p>Start Point:</p>
                  <p>End Point:</p>
                </div>

                <div class=" d-none d-sm-inline-block col-md-1">
                  <div class="vr " style="height: 100%;"></div>
                </div>

                <div class="col-md-5 col-sm-12 ">
                  <p>Start Time:</p>
                  <p>Aviliable Seats:</p>
                  <p>Aviliable Load Size:</p>
                  <p>Aviliable Load Weight:</p>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <a href="" class="btn  btn-trip-book">Reserve Seat</a>
              <a href="" class="btn  btn-trip-book">Send Packages</a>
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

  <script>
    var greenIcon = new L.Icon({
      iconUrl: 'https://img.icons8.com/material-sharp/48/2ECC71/marker.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [48, 48],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
    });
    var blueIcon = new L.Icon({
      iconUrl: 'https://img.icons8.com/material-sharp/48/3498DB/marker.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [48, 48],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
    });
    /*var map = L.map('map').setView([34.730818, 36.709527], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '© OpenStreetMap'
    }).addTo(map);
*/
    var map2 = L.map('map2').setView([34.730818, 36.709527], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '© OpenStreetMap'
    }).addTo(map2);

    var mark1
    var mark2

    var start = L.marker([51.5, -0.09], {
      icon: greenIcon
    }).addTo(map);

    var end = L.marker([51.5, -0.09], {
      icon: blueIcon
    }).addTo(map);


    function onMapClick(e) {

      if (mark1 != null && mark2 != null) {
        mark2 = null;
        mark1 = e.latlng;
        console.log("mark1 second val:" + mark1);

        start.setLatLng(e.latlng)
          .bindPopup("<b>start</b>")
          .openPopup()
          .addTo(map);

      }

      if (mark1 == null && mark2 == null) {
        mark1 = e.latlng;
        console.log("mark1 first val:" + mark1);

        start.setLatLng(mark1).bindPopup("<b>start</b>")
          .addTo(map).openPopup();

      }

      if (mark1 != null && mark2 == null && mark1 != e.latlng.toString()) {
        mark2 = e.latlng;
        console.log("mark2 first val:" + mark2);

        end.setLatLng(mark2)
          .bindPopup("<b>end</b>")
          .openPopup()
          .addTo(map);
      }

      console.log(typeof mark1);
      let ss1 = mark1.toString().slice(7, -1);
      let po1 = ss1.indexOf(",");
      let lat1 = ss1.slice(0, po1);
      let long1 = ss1.slice(po1 + 1, );
      console.log("test" + lat1 + "  |" + long1);

      console.log(typeof mark2);
      let ss2 = mark2.toString().slice(7, -1);
      let po2 = ss2.indexOf(",");
      let lat2 = ss2.slice(0, po2);
      let long2 = ss2.slice(po2 + 1, );
      console.log("test" + lat2 + "  |" + long2);

      document.getElementById('start_lat').value = lat1;
      document.getElementById('end_lat').value = lat2;
      document.getElementById('start_long').value = long2;
      document.getElementById('end_long').value = long2;
    }




    map.on('click', onMapClick);
  </script>



</body>

</html>