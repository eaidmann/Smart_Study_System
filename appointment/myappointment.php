<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];

$query = "Select AppID, startDate, endDate, startTime, endTime, Location, Course from appointment 
INNER JOIN course ON courseMentor='$matricno' AND course.courseID=appointment.Course";
$retval = mysqli_query($dbc,$query);

?>

<!DOCTYPE HTML>

<html>
    
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  type="text/css" href="../style/viewappointment.css">
    <title>View Appointment</title>
    
</head>

<body>
    
    <ul>
            <li><a href="../student_index.php">Home</a></li>
            <li><a href="../courses/mycourse.php">My Courses</a></li>
			<li><a class="active" href="myappointment.php">My Appointment</a></li>
            <li><a href="../courses/viewcourses.php">View Courses</a></li>
            <li><a href="../account/myaccount_student.php">My Account</a></li>
            <li class="logoutbtn"><a href="../logout/logout.php">Logout</a></li>
     </ul>
    
    <div class="bodycontent">
    <h1>APPOINTMENT STATUS</h1>
    <div class="tablestat">
        <table align="center">
            <thead>
                <th>ID</th>
                <th>Course Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Location</th>
                <th>Action</th>
            </thead>
			
            <?php
		while($row=mysqli_fetch_array($retval)){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" .$row['AppID']. "</td>"; 
        echo "<td>" .$row['Course']. "</td>";
        echo "<td>" .$row['startDate']. "</td>";
		echo "<td>" .$row['endDate']. "</td>";
        echo "<td>" .$row['startTime']. "</td>"; 
		echo "<td>" .$row['endTime']. "</td>";
		echo "<td>" .$row['Location']. "</td>";
		echo "<td><p align='center'><a href=drop_appointment.php?id=" .$row['AppID']. " /><input type='button' name='dropapp' value='Drop' /></a></td>";
		
		echo "</tr>";
        echo "</tbody>";
		
		}
		mysqli_close($dbc);
	?>
        </table>
    </div>
        </div>
</body>

</html>