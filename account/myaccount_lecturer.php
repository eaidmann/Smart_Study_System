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
        <title>Smart Study System - Lecturer Page</title>
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
            
                <tr>
                    <th>Lecturer ID :</th>
                <?php
                    echo "<td>" .$row['LectID']. "</td>";
                ?>
                </tr>
				
				<tr>
                    <th>First Name :</th>
                <?php
                    echo "<td>" .$row['FirstName']. "</td>";
                ?>
                </tr>
				
				<tr>
                    <th>Last Name :</th>
                <?php
                    echo "<td>" .$row['LastName']. "</td>";
                ?>
                </tr>
				
				<tr>
                    <th>Department :</th>
                <?php
				switch ($row['Department']) {
				
					case 1 :
						echo "<td>School of Computer and Communication Engineering</td>";
						break;
					case 2 :
						echo "<td>Faculty of Engineering Technology</td>";
						break;
					case 3 :
						echo "<td> Centre of Diploma Studies</td>";
						break;
					default :
						echo "<td>No Department Registered.</td>";
				}
					
                ?>
                </tr>
					
				<tr>
					<th></th>
				<?php	
					echo "<td><p align='right'><a class='editbttn' href=edit_myaccountL.php?id=" .$row['LectID']. " >Edit</a></p></td>";
				?>
				</tr>
            </table>
            
        </div>
    </body>
</html>