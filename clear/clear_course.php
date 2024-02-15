<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];
$mid = $_GET['id'];

$query = "DELETE FROM course where courseMentor='$mid'";
$retval = mysqli_query($dbc,$query);

if($retval){
	echo "<script>alert('Successfully Clear Your Course!!!')</script>";
	echo "<script>location.href='../account/myaccount_student.php'</script>";
}
else{
	echo "<script>alert('Failed to Clear Your Course. Please Try Again!!!')</script>";
	echo "<script>location.href='../account/myaccount_student.php'</script>";
}

mysqli_close($dbc);

?>