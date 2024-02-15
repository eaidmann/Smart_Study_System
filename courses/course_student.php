<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];
$courseid = $_GET['id'];

$query = "Select student.sMatricNo, student.FirstName, student.LastName, student.Programme from student INNER JOIN enroll ON student.sMatricNo=enroll.Student
INNER JOIN appointment ON appointment.AppID=enroll.Appointment INNER JOIN course ON course.courseID=appointment.Course AND course.courseID='$courseid'";
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
            <li><a href="#about">About</a></li>
            <li class="logoutbtn"><a href="../logout/logout.php">Logout</a></li>
        </ul>
        
        <div class="studentpage">
            
            <a class="bodybutton" href="mycourse.php">Back</a>
            
            <table style="margin: 0px auto;" border="1" cellpadding="8" cellspacing="3" bgcolor="lightblue">
			<thead>
            <th>Matric Number</th>
            <th>First Name</th>
            <th>Last Name</th>
			<th>Programme</th>
        </thead>
		
	<?php
		while($row=mysqli_fetch_array($retval)){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" .$row['sMatricNo']. "</td>"; 
        echo "<td>" .$row['FirstName']. "</td>";
        echo "<td>" .$row['LastName']. "</td>";
		echo "<td>" .$row['Programme']. "</td>";
		
		echo "</tr>";
        echo "</tbody>";
		
		}
		mysqli_close($dbc);
	?>
        </table>
        </div>
        
        </body>
</html>