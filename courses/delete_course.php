<?php

	require_once("../mysqli_connect/mysqliconnect.php");
	
	$courseid = $_GET['id'];
	
	$query = "Delete from course where courseID='$courseid'";
	$retval = mysqli_query($dbc,$query);
	
	if($retval){
		echo "<script>alert('Successfully Delete Course!!!')</script>";
        echo "<script>location.href='mycourse.php'</script>";
	}
	else{
		echo "<script>alert('Unsuccessful!!! Please try again...')</script>";
        echo "<script>location.href='mycourse.php'</script>";
	}
	
	mysqli_close($dbc);

?>