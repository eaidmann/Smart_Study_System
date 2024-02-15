<?php

session_start();

require_once('mysqli_connect/mysqliconnect.php');

$idnumber = $_SESSION['idnumber'];

$query = "Select FirstName from lecturer where LectID = '$idnumber'";
$retval = mysqli_query($dbc,$query);

?>

<!DOCTYPE HTML>

<html>
    
    <head lang="en">
        <meta charset="utf-8">
        <title>Smart Study System - Lecturer Page</title>
        <link rel="stylesheet" href="style/style.css" />
    </head>
    
    <body id="lectmain">
        <ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="courses/allcourse.php">View Courses</a></li>
            <li><a href="userlist/allstudent.php">View Student</a></li>
			<li><a href="approved/approved_courses.php">My Approval</a></li>
            <li><a href="account/myaccount_lecturer.php">My Account</a></li>
            <li class="logoutbtn"><a href="logout/logout2.php">Logout</a></li>
        </ul>
        
        <div class="lecturerpage">
            
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