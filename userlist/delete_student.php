<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$idnumber = $_SESSION['idnumber'];
$matricnumber = $_GET['id'];

$query = "Delete from student where sMatricNo='$matricnumber'";
$retval = mysqli_query($dbc,$query);

if($retval){
	echo "<script>alert('Student Successfully Deleted!!!')</script>";
    echo "<script>location.href='allstudent.php'</script>";
}
else{
	echo "<script>alert('Failed to delete the student because student had courses created. Please try again later.!')</script>";
    echo "<script>location.href='allstudent.php'</script>";
}

mysqli_close($dbc);

?>