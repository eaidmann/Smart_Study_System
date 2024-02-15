<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];
$courseid = $_GET['id'];

$query = "Delete from enroll where Appointment=(Select AppID from appointment where Course='$courseid')";
$retval = mysqli_query($dbc,$query);

if($retval){
	echo "<script>alert('Successfully Unenroll the Course. Thank You^^')</script>";
	echo "<script>location.href='viewcourses.php'</script>";
}
else{
	echo "<script>alert('Can't cancel. Please try again')</script>";
	echo "<script>location.href='viewcourses.php</script>";
	
}

mysqli_close($dbc);

?>