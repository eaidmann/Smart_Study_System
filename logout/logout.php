<?php
session_start();
unset($_SESSION['matricno']);
session_destroy();

header("Location: ../login/student_login.html");
exit;
?>