<?php include "template/header.php" ?>

<?php 
session_start();
if (!isset($_SESSION['login'])) {
    // echo $_SESSION['login'];
    echo "<script>alert('Please login first :');window.location.replace('login.php');</script>";
}
?>
  <p><a href="add.php"> Add rute</a></p>

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
        $terminal = mysqli_query($db_connection, $query);

        $i= 1;
        foreach ($terminal as $data)  :
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
</html>