<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Angkotin</title>
</head>
<!-- 
<?php 
//     session_start();
//     if(!isset($_SESSION['login'])) {
// 	    echo "<script>alert('Please Login First !');window.location.replace('index.php');</script>";
// }
?> -->


<body>
    <h1>Angkotin</h1>
    <h3>Form Penambahan Rute</h3>
    <form method="POST" action="create.php">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Longitude</td>
                <td><input type="text" name="longitude" required></td>
            </tr>
            <tr>
                <td>Latitude</td>
                <td><input type="text" name="latitude" required></td>
            </tr>


            <tr>
                <td></td>
                <td>
                    <input type="submit" name="save" value="SAVE">
                    <input type="reset" name="reset" value="RESET">
                </td>
            </tr>
        </table>
    </form>
    <p><a href="table.php">CANCEL</a></p>
</body>

</html>