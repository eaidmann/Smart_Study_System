<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$idnumber = $_SESSION['idnumber'];

$query = "Select courseID, courseName, courseDesc, courseMentor, ApprovBy from course";
$retval = mysqli_query($dbc,$query);

?>

<!DOCTYPE html>
<html>
    <head>
    <title>View Courses </title>
    <link href="../style/viewcourses.css" rel='stylesheet' type="text/css" />

</head>
<body id="allcourses">
    <ul>
        <li><a href="../lecturer_index.php">Home</a></li>
         <li><a  class="active" href="allcourse.php">View Courses</a></li>
        <li><a href="../userlist/allstudent.php">View Student</a></li>
		<li><a href="../approved/approved_courses.php">My Approval</a></li>
        <li><a href="../account/myaccount_lecturer.php">My Account</a></li>
        <li class="logoutbtn"><a href="../logout/logout2.php">Logout</a></li>
    </ul>
    
    <div class="Title">
            <h1>COURSES DETAILS </h1>
            <p1>In this pages, display all courses details have been registered. Lecturer can view the record. If course registered not been approved, any lecturer can approved or rejected.  </p1>
    </div>
    
    <div class="formstyle2">
    <table align="center" style="width: 75%"> 
            <thead>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Description</th>
                <th>Mentor</th>
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
		
		echo "<td><p align='center'><a href=approve_course.php?id=" .$row['courseID']. " /><input type='button' name='approved' value='Approved' /></a><br/><br/>  <a href=reject_course.php?id=" .$row['courseID']. " /><input type='button' name='rejected' value='Rejected' /></a></td>";
		
		echo "</tr>";
        echo "</tbody>";
		
		}
		mysqli_close($dbc);
	?>
            
    </table>
    </div>
</body>
</html>
