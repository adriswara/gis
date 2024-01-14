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
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>          
          </li>
          <li class="ms-4">
                <p>Pilih Tujuan : </p>
          </li>
          <li class="nav-item ms-4">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
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

      


</body>
<script>

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