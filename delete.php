<?php 

if (isset($_GET['id'])) {
    include "connection.php";



$query = "DELETE FROM rute WHERE id = '$_GET[id]'";


$delete = mysqli_query($db_connection ,$query);

    if ($delete) {
    // echo "<p>Pet added succesfully !</p>";
    echo "<script> alert('rute delete succesfuly !'); </script>";
    }
    else{
    // echo "<p>Pet add failed !</p>";
    echo "<script> alert('rute delete failed!'); </script>";
    }
}
?>
<!-- <p><a href="read_pet_220088.php">BACK TO PETS LIST</a></p> -->
<script>
window.location.replace("table.php");
</script>