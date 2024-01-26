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
    <table class="table" style="">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Rute</th>
          <th scope="col">Warna</th>
        </tr>
      </thead>

      <tbody>
        <tr>
         <th>1</th>
         <td>Caheum-Ledeng</td>
         <td style="background: green"></td>
        </tr>
        <tr>
         <th>2</th>
         <td>Ciroyom-Sarijadi</td>
         <td style="background: orange"></td>
        </tr>
        <tr>
         <th>3</th>
         <td>Cisitu-Tegalega</td>
         <td style="background: pink"></td>
        </tr>
        <tr>
         <th>4</th>
         <td>Cibiru-Cicadas</td>
         <td style="background: black"></td>
        </tr>
        <tr>
         <th>5</th>
         <td>Kebonkelapa-Dago</td>
         <td style="background: purple"></td>
        </tr>
        <tr>
         <th>6</th>
         <td>Pasar Kordon-Kebonkelapa</td>
         <td style="background: yellow"></td>
        </tr>
        <tr>
         <th>7</th>
         <td>Cimahi-Leuih Panjang</td>
         <td style="background: cyan"></td>
        </tr>
        <tr>
         <th>8</th>
         <td>Antapani-Ciroyom</td>
         <td style="background: brown"></td>
        </tr>
      </tbody>


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

      //route 1 caheum ledeng
      L.Routing.control({
				waypoints: [
					L.latLng(-6.902061686172729, 107.65629966845091),
					L.latLng(-6.859003683786733, 107.59505869558306)
				],
        lineOptions: {
          styles: [{color: 'green', opacity: 1, weight: 10}]
        }
			}).addTo(map);
      //route1
      //route 2 ciroyom sarijadi
      L.Routing.control({
				waypoints: [
					L.latLng(-6.9268954701077	, 107.55059094385247),
					L.latLng(-6.889676073381499	, 107.61271490563595)
				],
        lineOptions: {
          styles: [{color: 'orange', opacity: 1, weight: 10}]
        }
			}).addTo(map);
      //route 2
      //route 3 cisitu tegalega
      L.Routing.control({
				waypoints: [
					L.latLng(-6.872274344858246	, 107.61404520375844),
					L.latLng(-6.932631725980285, 107.60276455279126)
				],
        lineOptions: {
          styles: [{color: 'pink', opacity: 1, weight: 10}]
        }
			}).addTo(map);
      //route 3
       //route 4 cibiru cicadas
       L.Routing.control({
				waypoints: [
					L.latLng(-6.905082692350188, 107.57496685829632),
					L.latLng(-6.911410112080165, 107.64351008745952)
				],
        lineOptions: {
          styles: [{color: 'black', opacity: 1, weight: 10}]
        }
			}).addTo(map);
      //route 4
       //route 5 kebonkalapa dago
       L.Routing.control({
				waypoints: [
					L.latLng(-6.925770250985667, 107.6064554607754),
					L.latLng(-6.942231975610562, 107.68311352096971)
				],
        lineOptions: {
          styles: [{color: 'purple', opacity: 1, weight: 10}]
        }
			}).addTo(map);
      //route 5
       //route 6 pasar kordon kebon kelapa
       L.Routing.control({
				waypoints: [
					L.latLng(-6.94938884052372, 107.63848156494578),
					L.latLng(-6.925770250985667, 107.6064554607754)
				],
        lineOptions: {
          styles: [{color: 'yellow', opacity: 1, weight: 10}]
        }
			}).addTo(map);
      //route 6
       //route 7 Cimahi Leuih panjang
       L.Routing.control({
				waypoints: [
					L.latLng(-6.880584606143148	, 107.5380307276204),
					L.latLng(-6.945974047146048	, 107.59461437150387)
				],
        lineOptions: {
          styles: [{color: 'cyan', opacity: 1, weight: 10}]
        }
			}).addTo(map);
      //route 7
      //route 8 antapani ciroyom
      L.Routing.control({
				waypoints: [
					L.latLng(-6.915370567029123	, 107.66573481355405),
					L.latLng(-6.9268954701077	, 107.55059094385247)
				],
        lineOptions: {
          styles: [{color: 'brown', opacity: 1, weight: 10}]
        }
			}).addTo(map);
      //route 8
        //selected route
        L.Routing.control({
          waypoints: [
            L.latLng(longStart, latStart),
            L.latLng(longEnd, latEnd)
          ]
        }).addTo(map);
      //selected route

      
  }

//end fetch dropdown kedatangan

}//------------------------------------------------------------------------------------------
//end onload
	</script>
</html>