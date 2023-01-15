<?php
include('dbconnection.php');
$email=$_SESSION["email"];
$sql="select * from register where email='$email'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>
<div class="row">
	<div class="col-md-3" style="margin-left:10px;">
		<br>
		<img src="images/avatar1.png" class="img-fluid">
		<h5 class="text-center"><?php echo $row["first_name"]; ?>&nbsp;&nbsp;<?php echo $row["last_name"]; ?></h5>
		<h6 class="text-center"><?php echo $row["email"]; ?></h6>	
		<hr>
		<h6 class="text-secondary font-weight-bold">Management</h6><hr>
		<h6 class="text-secondary"><a href="dashboard.php" class="text-decoration-none text-secondary"><i class="fa-solid fa-house"></i> Dashboard</a></h6><hr>
		<h6 class="text-secondary"><a href="add_expense.php" class="text-decoration-none text-secondary"><i class="fa-solid fa-circle-plus"></i> Add Expenses</a></h6><hr>
		<h6 class="text-secondary"><a href="manage_expense.php" class="text-decoration-none text-secondary"><i class="fa-solid fa-money-bill-transfer"></i> Manage Expenses</a></h6><hr>
		<h6 class="text-secondary"><a href="add_income.php" class="text-decoration-none text-secondary"><i class="fa-solid fa-sack-dollar"></i> Add Income</a></h6><hr>
		<h6 class="text-secondary"><a href="profile.php" class="text-decoration-none text-secondary"><i class="fa-solid fa-user"></i> Profile</a></h6><hr>
		<h6 class="text-secondary"><a href="logout.php" class="text-decoration-none text-secondary"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></h6><hr>

	</div>
