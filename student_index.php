<?php

session_start();

require_once('mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];

$query = "Select FirstName from student where sMatricNo = '$matricno'";
$retval = mysqli_query($dbc,$query);

?>

<!DOCTYPE HTML>

<html>
    
    <head lang="en">
        <meta charset="utf-8">
        <title>Smart Study System - Student Page</title>
        <link rel="stylesheet" href="style/style.css" />
    </head>
    
    <body id="studentmain">
        
        <ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="courses/mycourse.php">My Courses</a></li>
			<li><a href="appointment/myappointment.php">My Appointment</a></li>
            <li><a href="courses/viewcourses.php">View Courses</a></li>
            <li><a href="account/myaccount_student.php">My Account</a></li>
            <li class="logoutbtn"><a href="logout/logout.php">Logout</a></li>
        </ul>
        
        <div class="studentpage">
            
            <div class="logo">
                <img src="image/logotrans.png">
            </div>
            
            <?php
		
		if(mysqli_num_rows($retval) > 0){
			while($row = mysqli_fetch_assoc($retval)){
                echo "<h1>Welcome to Smart Study System, <i> " .$row['FirstName'];
				echo "</i></h1>";
                
                echo "<p>Extent your learning limit to the maximum easy in front of you.</p>";
		} }
			else {
				 echo "<h1>Welcome to Smart Study System, Guest ";
				echo "</i></h1>";
                
                echo "<p>Extent your learning limit to the maximum easy in front of you.</p>";
			}
			
			mysqli_close($dbc);
?>
        </div>
        
        <div class="hero">
            <h1 class="h1main">ARE YOU READY ?</h1>
            <h2 class="h2main">DON'T WAIT</h2> 
            <h3 class="h3main">THE TIME WIL NEVER BE JUST RIGHT</h3>
                <h4 class="h4main">AIM FOR THE FUTURE</h4>
                <div class="button">
                    <a href="about/about.html" class="btn btn-one">ABOUT US</a>
                    <a href="about/contact.html" class="btn btn-two">CONTACT</a>
                </div>                
            </div>
        
    </body>
</html>