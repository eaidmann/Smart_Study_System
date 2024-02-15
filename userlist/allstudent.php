<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$idnumber = $_SESSION['idnumber'];

$query = "Select sMatricNo, FirstName, LastName, Programme from student";
$retval = mysqli_query($dbc,$query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>View All Students </title>
    <link href="../style/viewstudent.css" rel='stylesheet' type="text/css" />

</head>

<body>
    <div class="Title">
        <div class="type"> 
            <h1>STUDENT DETAILS </h1>
            <p1>In this pages, display all student details. Lecturer can deleted the students record. </p1>
        </div>
    </div>
    
    <ul>
    <li><a href="../lecturer_index.php">Home</a></li>
            <li><a href="../courses/allcourse.php">View Courses</a></li>
            <li><a  class="active" href="allstudent.php">View Student</a></li>
			<li><a href="../approved/approved_courses.php">My Approval</a></li>
            <li><a href="../account/myaccount_lecturer.php">My Account</a></li>
            <li class="logoutbtn"><a href="../logout/logout2.php">Logout</a></li>
    </ul>
    
    <div class="formstyle">
    <table align="center" style="width: 75%"> 
            <thead>
                <th>Matric Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Programme</th>
                <th>Action</th>
            </thead>
            
            <?php
		while($row=mysqli_fetch_array($retval)){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" .$row['sMatricNo']. "</td>"; 
        echo "<td>" .$row['FirstName']. "</td>";
        echo "<td>" .$row['LastName']. "</td>";
		echo "<td>" .$row['Programme']. "</td>"; 
		echo "<td><p align='center'><a href=delete_student.php?id=" .$row['sMatricNo']. " /><input type='button' name='deletestudent' value='Delete' /></a></td>";
		
		echo "</tr>";
        echo "</tbody>";
		
		}
		mysqli_close($dbc);
		?>
    </table>
    </div>
        
        </body>
</html>