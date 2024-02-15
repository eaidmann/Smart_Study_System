<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];
$mid = $_GET['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$prog = $_POST['prog'];

$query = "UPDATE student SET FirstName='$fname', LastName='$lname', Programme='$prog' where sMatricNo = '$mid'";
$retval = mysqli_query($dbc,$query);

if($retval){
	echo "<script>alert('Successfully Update Account Information!!!')</script>";
	echo "<script>location.href='myaccount_student.php'</script>";
}
else{
	echo "<script>alert('No Update Changed!!!')</script>";
	echo "<script>location.href='edit_myaccountS.php'</script>";
}

mysqli_close($dbc);
?>