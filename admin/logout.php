<?php
session_start();
session_unset($_SESSION['mobeeAdmin']);
header('Location:adminlogin.php?logout');
session_destroy();
exit();
?>