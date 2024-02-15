<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];

$query = "Select courseID, courseName, courseDesc, courseMentor, ApprovBy from course where courseMentor='$matricno'";
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
            <li><a class="active" href="mycourse.php">My Courses</a></li>
			<li><a href="../appointment/myappointment.php">My Appointment</a></li>
            <li><a href="viewcourses.php">View Courses</a></li>
            <li><a href="../account/myaccount_student.php">My Account</a></li>
            <li class="logoutbtn"><a href="../logout/logout.php">Logout</a></li>
        </ul>
        
        <div class="studentpage">
            
            <a class="bodybutton" href="create.php">Create</a>
            
            <table style="margin: 0px auto;" border="1" cellpadding="8" cellspacing="3" bgcolor="lightblue">
			<thead>
            <th>Course ID</th>
            <th>Name</th>
            <th>Description</th>
			<th>Student Mentor</th>
            <th>Approved By</th>
			<th>Status</th>
			<th>Action</th>
        </thead>
		
	<?php
		while($row=mysqli_fetch_array($retval)){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" .$row['courseID']. "</td>"; 
        echo "<td>" .$row['courseName']. "</td>";
        echo "<td>" .$row['courseDesc']. "</td>";
		echo "<td>" .$row['courseMentor']. "</td>";
        echo "<td>" .$row['ApprovBy']. "</td>"; 
		
		if($row['ApprovBy']==0){
			echo "<td style='background-color : red;'><b>Pending Approval...</b></td>";
		}
		else {
			echo "<td style='background-color : green;'><b>Approved</b></td>";
		}
		
		echo "<td><p align='center'><a href=delete_course.php?id=" .$row['courseID']. " /><input type='button' name='drop' value='Drop' /></a>&nbsp; <a href=../appointment/createappointment.php?id=" .$row['courseID']. " /><input type='button' name='createapp' value='Create Appointment' /></a>
		&nbsp; <a href=../courses/course_student.php?id=" .$row['courseID']. " /><input type='button' name='viewstudent' value='View Student' /></a></td>";
		
		echo "</tr>";
        echo "</tbody>";
		
		}
		mysqli_close($dbc);
	?>
        </table>
        </div>
        
        </body>
</html>