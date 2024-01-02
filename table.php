<?php include "template/header.php" ?>
  
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
          <td><a href=""><button class="btn btn-outline-primary">Edit</button></a></td>
          <td><a href=""><button class="btn btn-outline-danger">Delete</button></a></td>
        </tr>
      </tbody>
      <?php endforeach ?>


    </table>
    <!-- table -->
</body>
</html>