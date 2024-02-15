<?php
	
	require_once('../mysqli_connect/mysqliconnect.php');
	
	$matricno = $_POST['smatricno'];
	$pass = md5($_POST['pword']);
	
	$matricno= stripcslashes($matricno);
    $pass= stripcslashes($pass);
    $matricno = mysqli_real_escape_string($dbc,$matricno);
    $hashpass = mysqli_real_escape_string($dbc,$pass);
	
	$query = "select sMatricNo, Password from student where sMatricNo='$matricno' and Password='$pass'";
	$retval = mysqli_query($dbc,$query);
	
	$row = mysqli_num_rows($retval);
	
	$_SESSION['smatricno']= $matricno;
	
	session_start();
	
	if(isset($_SESSION['smatricno'])){
		echo "<script>alert('Successfully Logged In!! Redirecting to Student Home Page...')</script>";
        echo "<script>location.href='../student_index.php'</script>";
	}
    else{
		if($row==1){
			$_SESSION['smatricno']=$matricno;
		}
		else{
			echo "<script>alert('Failed to Login!')</script>";
			echo "<script>location.href='student_login.html'</script>";
    }
	}
	

?>