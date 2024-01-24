<?php 

if (isset($_POST['save'])) {
    include "connection.php";



$query = "UPDATE rute SET 
          nama = '$_POST[nama]', 
          longitude = '$_POST[longitude]', 
          latitude = '$_POST[latitude]'
          WHERE id = '$_POST[id]';
          ";


$update = mysqli_query($db_connection ,$query);

    if ($update) {
    // echo "<p>Pet update succesfully !</p>";
    echo "<script> alert('rute update succesfuly !'); </script>";
    }
    else{
    // echo "<p>Anggota update failed !</p>";
    echo "<script> alert('rute update failed!'); </script>";
    }
}
?>
<!-- <p><a href="read_pet_220088.php">BACK TO PETS LIST</a></p> -->
<script>
window.location.replace("read_terminal.php");
</script>