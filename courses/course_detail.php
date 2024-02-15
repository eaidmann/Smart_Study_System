<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];
$courseid = $_GET['id'];

$query = "Select appointment.AppID, appointment.startDate, appointment.endDate, appointment.startTime, appointment.endTime, appointment.Location, course.courseName from appointment INNER JOIN course ON appointment.Course=$courseid AND appointment.Course=course.courseID";
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
            <li><a href="#about">About</a></li>
            <li class="logoutbtn"><a href="../logout/logout.php">Logout</a></li>
        </ul>
        
        <div class="studentpage">
            
			<a href="viewcourses.php" ><input type="button" value="back" /></a><br/><br/>
            
            <table style="margin: 0px auto;" border="1" cellpadding="8" cellspacing="3" bgcolor="lightblue">
			<thead>
            <th>Appointment ID</th>
            <th>Course Name</th>
            <th>Start Date</th>
			<th>End Date</th>
            <th>Start Time</th>
			<th>End Time</th>
			<th>Location</th>
        </thead>
		
	<?php
		while($row=mysqli_fetch_array($retval)){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" .$row['AppID']. "</td>"; 
        echo "<td>" .$row['courseName']. "</td>";
        echo "<td>" .$row['startDate']. "</td>";
		echo "<td>" .$row['endDate']. "</td>";
        echo "<td>" .$row['startTime']. "</td>";
		echo "<td>" .$row['endTime']. "</td>";	
		echo "<td>" .$row['Location']. "</td>";
		
		echo "</tr>";
        echo "</tbody>";
		
		}
		mysqli_close($dbc);
	?>
        </table>
        </div>
        
        </body>
</html>