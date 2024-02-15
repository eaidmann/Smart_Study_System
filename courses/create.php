<?php

session_start();

require_once('../mysqli_connect/mysqliconnect.php');

$matricno = $_SESSION['smatricno'];

$query = "Select FirstName from student where sMatricNo = '$matricno'";
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
            <li><a href="viewcourses.php">View Courses</a></li>
            <li><a href="../account/myaccount_student.php">My Account</a></li>
            <li class="logoutbtn"><a href="../logout/logout.php">Logout</a></li>
        </ul>
        
        <div class="createpage">
            
            <a class="bodybutton" href="mycourse.php">Back</a>
            
            <h3><i>Create New Course</i></h3>
           
            <table cellpadding="2px" cellspacing="2px" align="center">
            <form action="createcourse.php" method="post">
                <tr>
                        <p><th>Course Name :</th><td><input type="text" name="coursename" />
                    </td>
                    </p>
                </tr>
                
                <tr>
                
                    <p><th>Course Description : </th><td><textarea rows="3" name="coursedesc"></textarea>
                    </td>
                    </p>
                </tr>
                
                <tr>
        <?php

echo "<p><th>Mentor ID : </th><td>" .$matricno. "</td></p>";

        ?>
                </tr>
                <tr>
                    <th></th>
                    <p><td align="right"><input type="submit" value="Create" /> </td></p>
                </tr>
            </form>
            </table>
            
        </div>
        
        </body>
</html>