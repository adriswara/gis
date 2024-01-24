<?php 
session_start();
session_destroy();
echo "<script> alert('Logout sucess !');window.location.replace('login.php'); </script>"
?>