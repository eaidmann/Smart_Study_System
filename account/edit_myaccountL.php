<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$idnumber = $_SESSION['idnumber'];

$query = "Select LectID, FirstName, LastName, Department from lecturer where LectID = '$idnumber'";
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
    
    <body id="lectmain">
        
        <ul>
            <li><a href="../lecturer_index.php">Home</a></li>
            <li><a href="../courses/allcourse.php">View Courses</a></li>
            <li><a href="../userlist/allstudent.php">View Student</a></li>
			<li><a href="../approved/approved_courses.php">My Approval</a></li>
            <li><a class="active" href="myaccount_lecturer.php">My Account</a></li>
            <li class="logoutbtn"><a href="../logout/logout2.php">Logout</a></li>
        </ul>
        
        <div class="lecturerpage">
		
			<p align="center"><h1><b><i>My Account</i></b></h1></p>
            
            <table class="accountdetail" align="center" cellpadding="10px" cellspacing="4px" >
			<?php
				echo "<form action=update_accountL.php?id=" .$row['LectID']. " method='POST'>";
            ?>
                <tr>
                    <th>Matric Number :</th>
                <?php
                    echo "<td>" .$row['LectID']. "</td>";
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
                    <th>Department :</th>
					<td><select name="dept">
                <?php
				switch ($row['Department']) {
				
					case 1 :
						echo "<option value=1 selected='selected'>School of Computer and Communication Engineering</option>
						<option value=2>Faculty of Engineering Technology</option>
						<option value=3>Centre of Diploma Studies</option></select></td>";
						break;
					case 2 :
						echo "<option value=1>School of Computer and Communication Engineering</option>
						<option value=2 selected='selected'>Faculty of Engineering Technology</option>
						<option value=3>Centre of Diploma Studies</option></select></td>";
						break;
					case 3 :
						echo "<option value=1>School of Computer and Communication Engineering</option>
						<option value=2>Faculty of Engineering Technology</option>
						<option value=3 selected='selected'>Centre of Diploma Studies</option></select></td>";
						break;
					default :
						echo "<option value=1>School of Computer and Communication Engineering</option>
						<option value=2>Faculty of Engineering Technology</option>
						<option value=3>Centre of Diploma Studies</option></select></td>";
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