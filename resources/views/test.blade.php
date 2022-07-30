<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Announce-Trip</title>
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
<style>
  #start_lat ,#end_lat {
  opacity: 0;
  width: 0;
   /* Reposition so the validation message shows over the label */
}
</style>
  <main id="main">

    <section class="trip">

      <div class="container">
        <div class="trip_info">




          <div class="section-title">
            <h2>Enter Your Trip Details </h2>

          </div>

          <form method="POST" action="{{ route('store_trip') }}">
            @csrf
  <input type="text" id="id" name="id" value="{{Auth::user()->id}}" hidden="true">
            <div class="form-group ">
              <div>

                <label>
                  Click on the map
                  to locate your end
                  and start point</label>
              </div>

              <div id="map" style="height: 180px; ">
              </div>

              <input type="text" id="start_lat" name="start_lat" value=""  required title="please select your start point">
              <input type="text" id="end_lat" name="end_lat" value="" required title="please select your end point">
              <input type="text" id="start_long" name="start_long" value="" hidden="true" required>
              <input type="text" id="end_long" name="end_long" value="" hidden="true" required>

            </div>





            <div class="form-group">
              <label for="start_time">Start Time:</label>
             
              <input type="datetime-local" class="form-control" name="start_time" id="start_time" required>



            </div>



            <div class="form-group">
              <label for="seats">Availiable Seats</label>
              <select class="form-select" id="seats" name="seats" required title="Select Availiable Seats">
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
              <label for="size">Availiable Packages Size</label>
              <input type="text" class="form-control" id="size" name="size" required pattern="[0-9]{3,}" title="only numbers allowed">


            </div>

            <div class="form-group">
              <label for="weight">Availiable Packages Weight</label>
              <input type="text" class="form-control" id="weight" name="weight" required pattern="[0-9]{3,}" title="only numbers allowed">
            </div>



            <div class=" signup-group">
              <button type="submit" class="btn-trip btn ">Announce The Trip</button>
            </div>


          </form>

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
    var map = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '© OpenStreetMap'
    }).addTo(map);


    var popup = L.popup();

    var mark1
    var mark2

    var start = L.marker([51.5, -0.09]).addTo(map);

    var end = L.marker([51.5, -0.09]).addTo(map);


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
      console.log("test"+lat1+"  |"+long1);
      
      console.log(typeof mark2);
      let ss2 = mark2.toString().slice(7, -1);
      let po2 = ss2.indexOf(",");
      let lat2 = ss2.slice(0, po2);
      let long2 = ss2.slice(po2 + 1, );
      console.log("test"+lat2+"  |"+long2);

      document.getElementById('start_lat').value = lat1;
      document.getElementById('end_lat').value = lat2;
      document.getElementById('start_long').value = long2;
      document.getElementById('end_long').value = long2;
    }



    map.on('click', onMapClick);
  </script>

</body>

</html>