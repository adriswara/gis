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
                  $query = "SELECT * FROM rute";
                  $rute = mysqli_query($db_connection, $query);

                  $i= 1;
                  foreach ($rute as $data)  :
                  ?>
                  <option label="<?php echo $data['nama'] ?>" value="<?php echo $data['longitude'] ?>"><?php echo $data['latitude'] ?> </option>
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
                $query = "SELECT * FROM rute";
                $rute = mysqli_query($db_connection, $query);

                $i= 1;
                foreach ($rute as $data)  :
                ?>
                <option value="<?php echo $data['id'] ?>"><?php echo $data['nama'] ?></option>
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
        $query = "SELECT * FROM rute";
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

  // getter

  var e = document.getElementById("routeStart");
  // var long = document.getElementById("longStart");
  function onChange() {
    var long = e.value;
    var lat = e.options[e.selectedIndex].text;
    console.log(long, text);
    // var map = L.map('map').setView([-6.9175, 107.6191], 11);
  }
  e.onchange = onChange;
  onChange();

  // getter

		var map = L.map('map').setView([-6.9175, 107.6191], 11);
		mapLink = "<a href='http://openstreetmap.org'>OpenStreetMap</a>";
		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { attribution: 'Leaflet &copy; ' + mapLink + ', contribution', maxZoom: 18 }).addTo(map);

		var taxiIcon = L.icon({
			iconUrl: 'img/waypoint.png',
			iconSize: [70, 70]
		})

    var marker = L.marker([-6.9175, 107.6191], { icon: taxiIcon }).addTo(map);

		map.on('click', function (e) {
			console.log(e)
			var newMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
			L.Routing.control({
				waypoints: [
					L.latLng(-6.9175, 107.6191),
					L.latLng(e.latlng.lat, e.latlng.lng)
				]
			}).on('routesfound', function (e) {
				var routes = e.routes;
				console.log(routes);

				e.routes[0].coordinates.forEach(function (coord, index) {
					setTimeout(function () {
						marker.setLatLng([coord.lat, coord.lng]);
					}, 100 * index)
				})

			}).addTo(map);
		});


	</script>
</html>