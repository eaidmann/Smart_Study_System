<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];

$query = "Select course.courseID, course.courseName, course.courseDesc, course.courseMentor, course.ApprovBy from course INNER JOIN appointment ON course.courseID=appointment.Course AND course.courseMentor<>$matricno";
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
            
			<?php
            echo "<a class='bodybutton' href=enroll.php?id=" .$matricno. " >View My Enroll Course</a>";
			?>
            
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
	if($retval){
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
		
		echo "<td><p align='center'><a href=course_detail.php?id=" .$row['courseID']. " /><input type='button' name='coursedetail' value='View Detail' /></a>
		&nbsp; <a href=enroll_course.php?id=" .$row['courseID']. " /><input type='button' name='enroll' value='Enroll' /></a></td>";
		
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