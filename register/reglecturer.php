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
        
        <div style="padding: 20px; margin-top: 30px; background-color: lightgreen; height: 1500px;">
        <div class="registerform">
            <h2 style="text-align: center">Lecturer Register</h2>
			
		<?php
			if(isset($_POST['submit'])){
				$data_missing = array();
				
				if(empty($_POST['idnumber'])){
					$data_missing[] = 'Identification Number';
				}
				else{
					$idnumber = trim($_POST['idnumber']);
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
				
				if(empty($_POST['department'])){
					$data_missing[] = 'Department';
				}
				else{
					$department = trim($_POST['department']);
				}
				
				if(empty($_POST['pword'])){
					$data_missing[] = 'Password';
				}
				else{
					$password = trim($_POST['pword']);
				}
				
				if(empty($data_missing)){
					require_once('../mysqli_connect/mysqliconnect.php');
					
					$query = "INSERT INTO lecturer(LectID,FirstName,LastName,Department,Password) values (?,?,?,?,?)";
					
					$stmt = mysqli_prepare($dbc,$query);
					
					$pass = md5($password);
					
					mysqli_stmt_bind_param($stmt, "issss", $idnumber, $f_name, $l_name, $department, $pass);
					
					mysqli_stmt_execute($stmt);
					
					$affected_rows = mysqli_stmt_affected_rows($stmt);
					
					if($affected_rows == 1){
						echo 'Lecturer Registered';
						
						echo "<script>location.href='../login/lecturer_login.html'</script>";
						
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
				<p>Identification Number : <input type="text" name="idnumber" value="" /></p>
				<p>First Name : <input type="text" name="fname" value="" /></p>
				<p>Last Name : <input type="text" name="lname" value="" /></p>
				<p>Department : <select name="department">
					<option value='1'>School of Computer and Communication</option>
					<option value='2'>Faculty of Engineering Technology</option>
					<option value='3'>Centre of Diploma Studies</option>
					</select>
				</p>
				<p>Password : <input type="password" name="pword" value="" /></p>
				<p><input type="submit" name="submit" value="Register" />&nbsp;&nbsp;
				<a href="../login/lecturer_login.html"><input type="button" value="Login" /></a></p>
		</form>
		</div>
        </div>
	</body>
</html>