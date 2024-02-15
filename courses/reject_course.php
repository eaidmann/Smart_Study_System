<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$idnumber = $_SESSION['idnumber'];
$courseid = $_GET['id'];

$query = "Update course SET ApprovBy=NULL where courseID='$courseid'";
$retval = mysqli_query($dbc,$query);

if($retval){
	echo "<script>alert('Course Successfully Rejected!!!')</script>";
    echo "<script>location.href='allcourse.php'</script>";
}
else{
	echo "<script>alert('Failed to reject the course. Please try again!')</script>";
    echo "<script>location.href='allcourse.php'</script>";
}

mysqli_close($dbc);

?>