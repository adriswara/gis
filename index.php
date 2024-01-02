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

    <div class="container">
        <div class="row mt-5">

            <!-- MAP -->
            <div class="col-sm">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56211042157!2d107.64315755000001!3d-6.903449449999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1703575725443!5m2!1sen!2sid" width="1024" height="720" style="border:1;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- MAP -->

            <!-- Lipsum -->
            <div class="col-sm">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero praesentium porro perspiciatis rem rerum ad. Minus perspiciatis voluptatem animi blanditiis odit exercitationem magnam, porro aliquid, expedita ipsum, eveniet facere in?
            </div>
            <!-- Lipsum -->
        </div>
    </div>

</body>
</html>