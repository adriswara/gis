<?php include "template/header.php" ?>

<?php 
if (!isset($_SESSION['login'])) {
    // echo $_SESSION['login'];
    echo "<script>alert('Please login first :');window.location.replace('login.php');</script>";
}
?>
<!-- Welcome -->
<h1 class="mt-5 mb-5"> Welome MR <?php echo $_SESSION['username'] ?> </h1>
<!-- Welcome -->
<!-- Dashboard -->

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5">
        
        

        <div class="col">
          <div class="card shadow-sm">
          <a href="read_terminal.php"> <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="img/terminal.png"  preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></img></a>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a href="read_terminal.php"><button type="button" class="btn btn-sm btn-outline-secondary">Terminal List</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
          <a href="read_rute.php"> <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="img/rute.png" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></img></a>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a href="read_rute.php"><button type="button" class="btn btn-sm btn-outline-secondary">Rute List</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        

        <div class="col">
          <div class="card shadow-sm">
          <a href="read_admin.php"><img class="bd-placeholder-img card-img-top" width="100%" height="225" src="img/admin.png" role="img" aria-label="Placeholder: " preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></img></a>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a href="read_admin.php"><button type="button" class="btn btn-sm btn-outline-secondary">Admin Setting</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

<!-- Dashboard -->

</body>
</html>