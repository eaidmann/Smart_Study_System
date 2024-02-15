<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];
$courseid = $_SESSION['courseid'];
$location = $_POST['location'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];

$query = "insert into appointment(startDate, endDate, startTime, endTime, Location, Course) 
values ('$startdate', '$enddate', '$starttime', '$endtime', '$location', '$courseid')";
$retval = mysqli_query($dbc,$query);

if($retval){
	echo "<script>alert('Successfully create an appointment. Redirect you to appointment view page...')</script>";
	echo "<script>location.href='myappointment.php'</script>";
}
else{
	echo "<script>alert('Missing a data. Please try again')</script>";
	echo "<script>location.href='createappointment.php?id=" .$courseid. "'</script>";
	
}

mysqli_close($dbc);

?>