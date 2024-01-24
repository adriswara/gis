<?php 
if (!isset($_SESSION['login'])) {
    // echo $_SESSION['login'];
    echo "<script>alert('Coming soon!');window.location.replace('dashboard.php');</script>";
}
?>