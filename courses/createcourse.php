<?php

	session_start();
	
	require_once("../mysqli_connect/mysqliconnect.php");
	
	$matricno = $_SESSION['smatricno'];
	$coursename = $_POST['coursename'];
	$coursedesc = $_POST['coursedesc'];
	
	$query = "INSERT INTO course (courseName, courseDesc, courseMentor) values ('$coursename','$coursedesc','$matricno')";
	$retval = mysqli_query($dbc, $query);
	
	if($retval){
		echo "<script>alert('Successfully Created New Course!!!')</script>";
        echo "<script>location.href='mycourse.php'</script>";
	}
	else{
		echo "<script>alert('Unsuccessful!!! Please try again...')</script>";
        echo "<script>location.href='create.php'</script>";
	}
	
	mysqli_close();
?>