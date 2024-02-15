<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];
$mid = $_GET['id'];

$query = "DELETE FROM appointment where Course = (SELECT courseID FROM course where courseMentor='$mid')";
$retval = mysqli_query($dbc,$query);

if($retval){
	echo "<script>alert('Successfully Clear Your Appointment!!!')</script>";
	echo "<script>location.href='../account/myaccount_student.php'</script>";
}
else{
	echo "<script>alert('Failed to Clear Your Appointment. Please Try Again!!!')</script>";
	echo "<script>location.href='../account/myaccount_student.php'</script>";
}

mysqli_close($dbc);

?>