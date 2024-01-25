<?php 

echo $_POST['username'];

if (isset($_POST['save'])) {
    include "connection.php";



$query = "INSERT INTO admin (username, password) VALUES ('$_POST[username]','$_POST[password]')";
$create = mysqli_query($db_connection ,$query);

if ($create) {
    // echo "<p>Pet added succesfully !</p>";
    echo "<script> alert('admin added succesfuly !'); </script>";
}
else{
    // echo "<p>Pet add failed !</p>";
echo "<script> alert('admin add failed!'); </script>";
}
}

?>
<!-- <p><a href="read_pet_220088.php">BACK TO PETS LIST</a></p> -->
<script>
window.location.replace("read_admin.php");
</script>