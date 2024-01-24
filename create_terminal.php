<?php 

echo $_POST['nama'];

if (isset($_POST['save'])) {
    include "connection.php";



$query = "INSERT INTO terminal (nama, longitude, latitude) VALUES ('$_POST[nama]','$_POST[longitude]','$_POST[latitude]')";
$create = mysqli_query($db_connection ,$query);

if ($create) {
    // echo "<p>Pet added succesfully !</p>";
    echo "<script> alert('terminal added succesfuly !'); </script>";
}
else{
    // echo "<p>Pet add failed !</p>";
echo "<script> alert('terminal add failed!'); </script>";
}
}

?>
<!-- <p><a href="read_pet_220088.php">BACK TO PETS LIST</a></p> -->
<script>
window.location.replace("read_terminal.php");
</script>