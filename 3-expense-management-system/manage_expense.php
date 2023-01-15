<?php
session_start();
if(!isset($_SESSION["email"]))
{
	header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="images/logo.png" type="image/png">
	<title>User Dashboard</title>
</head>
<body>
	
		<?php
		include('leftbar.php');
		?>
		
		<div class="col-md-5 offset-md-1">
			<h3 class="text-primary">Manage Expenses</h3>
			<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<tr class="table-primary">
					<th>S.No</th>
					<th>Category</th>
					<th>Date</th>
					<th>Amount</th>
					<th>Action</th>
					
					
				</tr>
				<?php
				include('dbconnection.php');
				$email=$_SESSION["email"];
				$sql="select * from expenses where email='$email' order by id desc";
				$result=mysqli_query($con,$sql);
				if(mysqli_num_rows($result)>0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						?>
						<tr>
						<td class="text-info"><?php echo $row["id"]; ?></td>
						<td class="font-weight-bold text-info"><?php echo $row["category"]; ?></td>
						<td class="text-info"><?php echo $row["date"]; ?></td>
						<td class="text-info"><?php echo $row["amount"]; ?></td>
						<td>
							<a href="expense_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
							<a href="expense_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
						</td>
						
					</tr>

						<?php
					}
				}

				?>
				<tr>
				</tr>
			</table>
		</div>

					
	</div>

</body>
</html>