<?php
include('dbconnection.php');
$id=$_GET["id"];
$sql="delete from expenses where id='$id'";
if(mysqli_query($con,$sql))
{
header("Location:manage_expense.php");
}
?>