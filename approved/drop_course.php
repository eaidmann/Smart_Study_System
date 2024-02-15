<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$idnumber = $_SESSION['idnumber'];
$courseid = $_GET['id'];

$query = "Delete from course WHERE courseID='$courseid'";
$retval = mysqli_query($dbc,$query);

if($retval){
	echo "<script>alert('Course Successfully Dropped!!!')</script>";
    echo "<script>location.href='approved_courses.php'</script>";
}
else{
	echo "<script>alert('Failed to drop the course. Please try again!')</script>";
    echo "<script>location.href='approved_courses.php'</script>";
}

mysqli_close($dbc);

?>