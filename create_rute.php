<?php 

echo $_POST['nama'];

if (isset($_POST['save'])) {
    include "connection.php";



$query = "INSERT INTO rute (fk_terminalA, fk_terminalB ) VALUES ('$_POST[fk_terminalA]','$_POST[fk_terminalB]')";
$create = mysqli_query($db_connection ,$query);

if ($create) {
    // echo "<p>Pet added succesfully !</p>";
    echo "<script> alert('rute added succesfuly !'); </script>";
}
else{
    // echo "<p>Pet add failed !</p>";
echo "<script> alert('rute add failed!'); </script>";
}
}

?>
<!-- <p><a href="read_pet_220088.php">BACK TO PETS LIST</a></p> -->
<script>
window.location.replace("read_rute.php");
</script>