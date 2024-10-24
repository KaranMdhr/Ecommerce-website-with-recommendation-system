<?php
 $con = mysqli_connect('localhost','root','','mobee');
 

 if($con->connect_error)
 {
 	echo "Db Connection Error".$con->connect_error;
 }
?>