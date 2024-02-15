<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];

$query = "Select course.courseID, course.courseName, course.courseDesc, course.courseMentor, course.ApprovBy from course INNER JOIN enroll ON enroll.Student='$matricno' INNER JOIN appointment ON appointment.AppID=enroll.Appointment AND appointment.Course=course.courseID";
$retval = mysqli_query($dbc,$query);

?>

<!DOCTYPE HTML>

<html>
    
    <head lang="en">
        <meta charset="utf-8">
        <title>Smart Study System - Student Page</title>
        <link rel="stylesheet" href="../style/style.css" />
    </head>
    
    <body id="mycoursepage">
        <ul>
            <li><a href="../student_index.php">Home</a></li>
            <li><a  href="mycourse.php">My Courses</a></li>
			<li><a href="../appointment/myappointment.php">My Appointment</a></li>
            <li><a class="active" href="viewcourses.php">View Courses</a></li>
            <li><a href="../account/myaccount_student.php">My Account</a></li>
            <li class="logoutbtn"><a href="../logout/logout.php">Logout</a></li>
        </ul>
        
        <div class="studentpage">
            
			<a class="bodybutton" href="viewcourses.php">Back</a>
            
            <table style="margin: 0px auto;" border="1" cellpadding="8" cellspacing="3" bgcolor="lightblue">
			<thead>
            <th>Course ID</th>
            <th>Name</th>
            <th>Description</th>
			<th>Student Mentor</th>
            <th>Approved By</th>
			<th>Action</th>
        </thead>
		
	<?php
	if($retval){
		while($row=mysqli_fetch_array($retval)){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" .$row['courseID']. "</td>"; 
        echo "<td>" .$row['courseName']. "</td>";
        echo "<td>" .$row['courseDesc']. "</td>";
		echo "<td>" .$row['courseMentor']. "</td>";
        echo "<td>" .$row['ApprovBy']. "</td>"; 
		
		echo "<td><p align='center'><a href=cancel_enroll.php?id=" .$row['courseID']. " /><input type='button' name='cancelenroll' value='Cancel' /></a></td>";
		
		echo "</tr>";
        echo "</tbody>";
		
		}
	}
	else{
		echo "<tr>";
		echo "<td>No DATA FOUND</td>";
		echo "</tr>";
	}
		mysqli_close($dbc);
	?>
        </table>
        </div>
        
        </body>
</html>