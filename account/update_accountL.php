<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$idnumber = $_SESSION['idnumber'];
$lid = $_GET['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dept = $_POST['dept'];

$query = "UPDATE lecturer SET FirstName='$fname', LastName='$lname', Department='$dept' where LectID = '$lid'";
$retval = mysqli_query($dbc,$query);

if($retval){
	echo "<script>alert('Successfully Update Account Information!!!')</script>";
	echo "<script>location.href='myaccount_lecturer.php'</script>";
}
else{
	echo "<script>alert('No Update Changed!!!')</script>";
	echo "<script>location.href='edit_myaccountL.php'</script>";
}

mysqli_close($dbc);
?>