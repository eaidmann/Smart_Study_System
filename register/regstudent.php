<!DOCTYPE HTML>

<html>

	<head>
        <title>Smart Study System - Register</title>
        <link rel="stylesheet" href="../style/style.css" />
    </head>
	
	<body>
	
	<ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="#news">News</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        
        <div style="padding: 20px; margin-top: 30px; background-color: lightgrey; height: 1500px;">
        <div class="registerform">
            <h2 style="text-align: center">Student Register</h2>
			
		<?php
			if(isset($_POST['submit'])){
				$data_missing = array();
				
				if(empty($_POST['smatricno'])){
					$data_missing[] = 'Matric Number';
				}
				else{
					$smatricno = trim($_POST['smatricno']);
				}
				
				if(empty($_POST['fname'])){
					$data_missing[] = 'First Name';
				}
				else{
					$f_name = trim($_POST['fname']);
				}
				
				if(empty($_POST['lname'])){
					$data_missing[] = 'Last Name';
				}
				else{
					$l_name = trim($_POST['lname']);
				}
				
				if(empty($_POST['programme'])){
					$data_missing[] = 'Programme';
				}
				else{
					$programme = trim($_POST['programme']);
				}
				
				if(empty($_POST['pword'])){
					$data_missing[] = 'Password';
				}
				else{
					$password = trim($_POST['pword']);
				}
				
				if(empty($data_missing)){
					require_once('../mysqli_connect/mysqliconnect.php');
					
					$query = "INSERT INTO student(sMatricNo,FirstName,LastName,Programme,Password) values (?,?,?,?,?)";
					
					$stmt = mysqli_prepare($dbc,$query);
					
					$pass = md5($password);
					
					mysqli_stmt_bind_param($stmt, "issss", $smatricno, $f_name, $l_name, $programme, $pass);
					
					mysqli_stmt_execute($stmt);
					
					$affected_rows = mysqli_stmt_affected_rows($stmt);
					
					if($affected_rows == 1){
						echo 'Student Registered';
						
						echo "<script>location.href='../login/student_login.html'</script>";
						
						mysqli_stmt_close($stmt);
						
						mysqli_close($dbc);
					}
					else{
						echo 'Error Occured<br/>';
						echo mysqli_error();
						
						mysqli_stmt_close($stmt);
						
						mysqli_close($dbc);
					}
				}
				else{
					echo 'You need to enter the following data<br/>';
					
					foreach($data_missing as $missing){
						echo "$missing<br/>";
					}
				}
			}
		?>
		
		<form action="regstudent.php" method="post">
			<b>Register New Account</b>
				<p>Matric Number : <input type="text" name="smatricno" value="" /></p>
				<p>First Name : <input type="text" name="fname" value="" /></p>
				<p>Last Name : <input type="text" name="lname" value="" /></p>
				<p>Programme : <select name="programme">
					<option value="RY40">RY40 - Electronic System</option>
					<option value="RY41">RY41 - Telecommunication</option>
					<option value="RY43">RY43 - Electronic Network Design</option>
					<option value="RY44">RY44 - Embedded</option>
					</select>
				</p>
				<p>Password : <input type="password" name="pword" value="" /></p>
				<p><input type="submit" name="submit" value="Register" />&nbsp;&nbsp;
				<a href="../login/student_login.html"><input type="button" value="Login" /></a></p>
		</form>
		</div>
        </div>
	</body>
</html>