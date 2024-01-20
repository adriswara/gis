<?php include "template/header.php" ?>

   <!-- NAVBAR FORM -->
   

  <nav class="navbar navbar-expand-lg  bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Pilih Rute</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">                  
            <li class="ms-4">
                <p>Pilih Titik Mulai : </p>
            </li>
            <li class="nav-item ms-4">
            <form >
              <select class="form-select" id="routeStart" aria-label="Floating label select example">
                  <option selected>Open this select menu</option>
                  <?php
                  include "connection.php";
                  $query = "SELECT * FROM terminal";
                  $rute = mysqli_query($db_connection, $query);

                  $i= 1;
                  foreach ($rute as $data)  :
                  ?>
                  <option label="<?php echo $data['nama'] ?>" value="<?php echo $data['longitude']?>,<?php echo $data['latitude']?>,<?php echo $data['nama'] ?>"></option>
                  <?php endforeach ?>          
              </select>
            </form>
          </li>
          <li class="ms-4">
                <p>Pilih Tujuan : </p>
          </li>
          <li class="nav-item ms-4">
            <select class="form-select" id="routeEnd" aria-label="Floating label select example">
                <option selected>Open this select menu</option>
                <?php
                include "connection.php";
                $query = "SELECT * FROM terminal";
                $rute = mysqli_query($db_connection, $query);

                $i= 1;
                foreach ($rute as $data)  :
                ?>
                  <option label="<?php echo $data['nama'] ?>" value="<?php echo $data['longitude']?>,<?php echo $data['latitude']?>,<?php echo $data['nama'] ?>"></option>
                <?php endforeach ?>          
            </select>          
        </ul>
        <ul></ul>
        <!-- <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select> -->
      </div>
    </div>
  </nav>

<!-- NAVBAR FORM -->

   
       
          <!-- MAP -->
            
          <div id="map" style="width:100%; height: 100vh"></div>
	        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
	        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

          <!-- MAP -->


          <!-- table -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Longitude</th>
          <th scope="col">Latitude</th>
          <th colspan="2" scope="col">Action</th>
        </tr>
      </thead>

      <?php
        include "connection.php";
        $query = "SELECT * FROM terminal";
        $rute = mysqli_query($db_connection, $query);

        $i= 1;
        foreach ($rute as $data)  :
      ?>

      <tbody>
        <tr>
          <th scope="row"><?php echo $i++; ?></th>
          <td><?php echo $data['nama']?></td>
          <td><?php echo $data['longitude']?></td>
          <td><?php echo $data['latitude']?></td>
          <td><a href="edit.php?id=<?=$data['id']?>"><button class="btn btn-outline-primary">Edit</button></a></td>
          <td><a href="delete.php?id=<?=$data['id']?>"><button class="btn btn-outline-danger">Delete</button></a></td>
        </tr>
      </tbody>
      <?php endforeach ?>


    </table>
    <!-- table -->
      


</body>
<script>  
// onload
window.onload = function() {
//start create open street map instance
  var map = L.map('map').setView([-6.9175, 107.6191], 11);  
  var layer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);
//end create open street map instance
var longStart = 0;
var longEnd = 0;
var latStart = 0;
var latEnd = 0;  
var descStart = "";
var descEnd = "";
//fetch dropdown keberangkatan
  var dropdown1 = document.getElementById("routeStart");
  dropdown1.addEventListener("change", (e) => {
    var coord = e.target.value.split(",")
    console.log(coord)
    var long = coord[0]
    var lat = coord[1]
    descStart = coord[2]
    console.log(descStart)
    if (long!== NaN&&lat!==NaN) {
      addPoint1(parseFloat(long), parseFloat(lat));
    }
    else{
      console.log("all data is undefined");
    }
  
  }
  );

  function addPoint1(long, lat){
  
    var taxiIcon = L.icon({
      iconUrl: 'img/waypoint.png',
      iconSize: [70, 70]
    })

    console.log(long, lat);
    var marker = new L.marker([long, lat]).addTo(map).bindPopup(descStart).openPopup();
    longStart = long
    latStart = lat
    // marker.bindPopup("waypoint1").openPopup();
  }
//end fetch dropdown keberangkatan

//fetch dropdown kedatangan

var dropdown2 = document.getElementById("routeEnd");
  
  dropdown2.addEventListener("change", (e) => {
    var coord = e.target.value.split(",")
    console.log(coord)
    var long = coord[0]
    var lat = coord[1]
    descEnd = coord[2]
   
    if (long!== NaN&&lat!==NaN) {
      addPoint2(parseFloat(long), parseFloat(lat));
    }
    else{
      console.log("all data is undefined");
    }
  
  }
  );

  function addPoint2(long, lat){
  
    var taxiIcon = L.icon({
      iconUrl: 'img/waypoint.png',
      iconSize: [70, 70]
    })
    
    console.log(long, lat);
    longEnd = long
    latEnd = lat
    var marker1 = new L.marker([longStart, latStart]).addTo(map).bindPopup(descStart).openPopup();
    // marker1.bindPopup("waypoint1").openPopup();
    var marker2 = new L.marker([longEnd, latEnd]).addTo(map).bindPopup(descStart+" menuju ke "+descEnd).openPopup();
    // marker2.bindPopup("waypoint2").openPopup();

    L.Routing.control({
				waypoints: [
					L.latLng(longStart, latStart),
					L.latLng(longEnd, latEnd)
				]
			}).addTo(map);
  }

//end fetch dropdown kedatangan

}//------------------------------------------------------------------------------------------
//end onload
	</script>
</html>