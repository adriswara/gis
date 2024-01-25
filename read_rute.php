<?php include "template/header.php" ?>

<?php 
if (!isset($_SESSION['login'])) {
    // echo $_SESSION['login'];
    echo "<script>alert('Please login first :');window.location.replace('login.php');</script>";
}
?>
  <p><a href="add_rute.php"> Add rute</a></p>

    <!-- table -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titik Awal</th>
          <th scope="col">Titik Akhir</th>
          <th colspan="2" scope="col">Action</th>
        </tr>
      </thead>

      <?php
        include "connection.php";
        $query = "SELECT * FROM rute join terminal on rute.fk_terminalA = terminal.id";
        $rute = mysqli_query($db_connection, $query);
     

        $i= 1;
        foreach ($rute as $data)  :
      ?>

      <tbody>
        <tr>
          <th scope="row"><?php echo $i++; ?></th>
          <td><?php echo $data['nama']?></td>
          <td><?php echo $data['fk_terminalB']?></td>
          <td><a href="edit_rute.php?id=<?=$data['id_rute']?>"><button class="btn btn-outline-primary">Edit</button></a></td>
          <td><a href="delete_rute.php?id=<?=$data['id_rute']?>"><button class="btn btn-outline-danger">Delete</button></a></td>
        </tr>
      </tbody>
      <?php endforeach ?>


    </table>
    <!-- table -->
</body>
</html>