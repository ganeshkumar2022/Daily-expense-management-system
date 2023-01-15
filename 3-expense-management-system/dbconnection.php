<?php
$con=mysqli_connect("localhost","root","","expense-management-system");
if(!$con)
{
	echo "database connection error".mysqli_connect_error();
}


?>