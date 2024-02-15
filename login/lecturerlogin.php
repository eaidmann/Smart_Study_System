<?php
	
	require_once('../mysqli_connect/mysqliconnect.php');
	
	$idnumber = $_POST['idnumber'];
	$pass = md5($_POST['pword']);
	
	$idnumber = stripcslashes($idnumber);
    $pass = stripcslashes($pass);
    $idnumber = mysqli_real_escape_string($dbc,$idnumber);
    $pass = mysqli_real_escape_string($dbc,$pass);
	
	$query = "select LectID, Password from lecturer where LectID='$idnumber' and Password='$pass'";
	$retval = mysqli_query($dbc,$query);
	
	$row = mysqli_num_rows($retval);
	
	$_SESSION['idnumber']= $idnumber;
	
	session_start();
	
	if(isset($_SESSION['idnumber'])){
		echo "<script>alert('Successfully Logged In!! Redirecting to Lecturer Home Page...')</script>";
        echo "<script>location.href='../lecturer_index.php'</script>";
	}
    else{
		if($row==1){
			$_SESSION['idnumber']=$idnumber;
		}
		else{
			echo "<script>alert('Failed to Login!')</script>";
			echo "<script>location.href='lecturer_login.html'</script>";
    }
	}
	

?>