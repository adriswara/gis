<?php
session_start(); //start session
if(isset($_POST['login'])) { //check post variable
	include "connection.php"; //call connection
	
	//make query based on username
	$query="SELECT * FROM admin WHERE username='$_POST[username]'";
	
	//run query 
	$login=mysqli_query($db_connection,$query);
	
	if(mysqli_num_rows($login) > 0) {
		$user=mysqli_fetch_assoc($login);
		if(($_POST['password'] = $user['password'])) {
			
		$_SESSION['login']=TRUE;
		$_SESSION['id']=$user['id'];
		$_SESSION['username']=$user['username'];
		$_SESSION['password']=$user['password'];
		
		echo "<script>alert('login success !');window.location.replace('table.php');</script>";
		} else {
			echo "<script>alert('login failed, wrong password !');window.location.replace('login.php');</script>";
		}
		}else {
			echo "<script>alert('login failed, user not found !');window.location.replace('login.php');</script>";
	}
}
?>