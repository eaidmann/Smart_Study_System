<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];

$query = "Select sMatricNo, FirstName, LastName, Programme from student where sMatricNo = '$matricno'";
$retval = mysqli_query($dbc,$query);

$row=mysqli_fetch_array($retval);

?>

<!DOCTYPE HTML>

<html>
    
    <head lang="en">
        <meta charset="utf-8">
        <title>Smart Study System - Student Page</title>
        <link rel="stylesheet" href="../style/style.css" />
    </head>
    
    <body id="studentmain">
        
        <ul>
            <li><a href="../student_index.php">Home</a></li>
            <li><a href="../courses/mycourse.php">My Courses</a></li>
			<li><a href="../appointment/myappointment.php">My Appointment</a></li>
            <li><a href="../courses/viewcourses.php">View Courses</a></li>
            <li><a class="active" href="myaccount_student.php">My Account</a></li>
            <li class="logoutbtn"><a href="../logout/logout.php">Logout</a></li>
        </ul>
        
        <div class="studentpage">
		
			<p align="center"><h1><b><i>My Account</i></b></h1></p>
            
            <table class="accountdetail" align="center" cellpadding="10px" cellspacing="4px" >
			<?php
				echo "<form action=update_accountS.php?id=" .$row['sMatricNo']. " method='POST'>";
            ?>
                <tr>
                    <th>Matric Number :</th>
                <?php
                    echo "<td>" .$row['sMatricNo']. "</td>";
                ?>
                </tr>
				
				<tr>
                    <th>First Name :</th>
                <?php
                    echo "<td><input type='text' name='fname' value='" .$row['FirstName']. "' /></td>";
                ?>
                </tr>
				
				<tr>
                    <th>Last Name :</th>
                <?php
                    echo "<td><input type='text' name='lname' value='" .$row['LastName']. "' /></td>";
                ?>
                </tr>
				
				<tr>
                    <th>Programme :</th>
					<td><select name="prog">
                <?php
				switch ($row['Programme']) {
				
					case "RY40" :
						echo "<option value='RY40' selected='selected'>RY40 - Electronic System</option>
						<option value='RY41'>RY41 - Telecommunication System</option>
						<option value='RY43'>RY43 - Electronic Network Design</option>
						<option value='RY44'>RY44 - Embedded System Electronic</option></select></td>";
						break;
					case "RY41" :
						echo "<option value='RY40'>RY40 - Electronic System</option>
						<option value='RY41' selected='selected'>RY41 - Telecommunication System</option>
						<option value='RY43'>RY43 - Electronic Network Design</option>
						<option value='RY44'>RY44 - Embedded System Electronic</option></select></td>";
						break;
					case "RY43" :
						echo "<option value='RY40'>RY40 - Electronic System</option>
						<option value='RY41'>RY41 - Telecommunication System</option>
						<option value='RY43' selected='selected'>RY43 - Electronic Network Design</option>
						<option value='RY44'>RY44 - Embedded System Electronic</option></select></td>";
						break;
					case "RY44" :
						echo "<option value='RY40'>RY40 - Electronic System</option>
						<option value='RY41'>RY41 - Telecommunication System</option>
						<option value='RY43'>RY43 - Electronic Network Design</option>
						<option value='RY44' selected='selected'>RY44 - Embedded System Electronic</option></select></td>";
						break;
					default :
						echo "<option value='RY40'>RY40 - Electronic System</option>
						<option value='RY41'>RY41 - Telecommunication System</option>
						<option value='RY43'>RY43 - Electronic Network Design</option>
						<option value='RY44'>RY44 - Embedded System Electronic</option></select></td>";
				}
					
                ?>
                </tr>
					
				<tr>
					<th></th>
				<?php	
					echo "<td><p align='right'><input type='submit' name='update' value='Update' /></p></td>";
				?>
				</tr>
				</form>
            </table>
            
        </div>
    </body>
</html>