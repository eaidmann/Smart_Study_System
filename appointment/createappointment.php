<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];
$courseid = $_GET['id'];
$_SESSION['courseid'] = $courseid;

$query = "Select courseName from course where courseID='$courseid'";
$retval = mysqli_query($dbc,$query);

$row = mysqli_fetch_array($retval);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Appointment Form</title>
        <link rel="stylesheet" type="text/css" href="../style/appointmentform.css" />
    </head>
    
    <body>
        
        <ul>
            <li><a href="../student_index.php">Home</a></li>
            <li><a href="../courses/mycourse.php">My Courses</a></li>
			<li><a class="active" href="myappointment.php">My Appointment</a></li>
            <li><a href="#contact">View Courses</a></li>
            <li><a href="#about">About</a></li>
            <li class="logoutbtn"><a href="../logout/logout.php">Logout</a></li>
     </ul>
        
        <div class="appointmentheader">
            <h1><center><B>APPOINTMENT FORM</B></center></h1>
        </div>
        <div class="appointmentform">
		<form action="create.php" method="POST"><center>
                <p>Course:
					<?php
                     echo " " .$row['courseName']. "</p>";
					?>
				</p>

				<p>Location : <input type="text" name="location" /></p>
				<p>Start Date : <input type="date" name="startdate" /></p>
				<p>End Date : <input type="date" name="enddate" /></p>
				<p>Start Time : <input type="time" name="starttime" /></p>
				<p>End Time : <input type="time" name="endtime" /></p>
				
				<p><input type="submit" name="submit" value="Create" /> &nbsp; <a href="../courses/mycourse.php"><input type="button" name="cancel" value="Cancel" /></a></p>
            </center>
            </form>
        
        </div>
    </body>
</html>