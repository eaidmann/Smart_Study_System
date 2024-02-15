<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];
$appid = $_GET['id'];

$query = "Delete from enroll where Appointment='$appid'";
$retval = mysqli_query($dbc,$query);

$query2 = "Delete from appointment where AppID='$appid'";
$retval2 = mysqli_query($dbc,$query2);

if($retval2){
	echo "<script>alert('Successfully dropped an appointment. Redirect you to appointment view page...')</script>";
	echo "<script>location.href='myappointment.php'</script>";
}
else{
	echo "<script>alert('Can't drop. Please try again')</script>";
	echo "<script>location.href='myappointment.php'</script>";
	
}

mysqli_close($dbc);

?>