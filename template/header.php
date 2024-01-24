<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
	  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <!-- end leaflet -->
    <title>Angkotin</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="index.html">Angkotin Yuk</a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
              </li>
              <li class="nav-item">
              </li>
            </ul>
            <?php 
               session_start();
               if (isset($_SESSION['login'])) {
                  echo "<p>Logged as :" . $_SESSION['username'] . "</p><a class='nav-link' href='logout.php' aria-disabled='true'><button class='btn btn-outline-primary' type='submit'>Logout</button></a>";
 
               }
               else if(!isset($_SESSION['login'])) {
                echo "<a class='nav-link' href='login.php' aria-disabled='true'><button class='btn btn-outline-primary' type='submit'>Admin Login</button></a>";
              }
            ?>
          </div>
        </div>
      </nav>
    <!-- NAVBAR -->