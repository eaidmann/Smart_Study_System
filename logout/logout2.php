<?php
session_start();
unset($_SESSION['idnumber']);
session_destroy();

header("Location: ../login/lecturer_login.html");
exit;
?>