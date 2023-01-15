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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="images/logo.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<title>User Dashboard</title>
	<style>
		h4,p
		{
			color:white;

		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<?php
		include('leftbar.php');
		?>
		<div class="col-md-2 mt-4">
			<div class="card bg-primary">
				<div class="card-body">
					<h4 class="text-center">Food</h4>
					<?php
						include('dbconnection.php');
						$email2=$_SESSION["email"];
						$sql2="select SUM(amount) as su from expenses where email='$email2' and category='Food'";
						$result2=mysqli_query($con,$sql2);
						$row2=mysqli_fetch_assoc($result2);

						?>
					<p class="text-center"><i class="fa-solid fa-utensils" style="font-size:30px;"></i></p>
					<p class="text-center font-weight-bold"><?php echo $row2["su"]; ?> &#8377;</p>
				</div>
			</div><br>
			<div class="card bg-success">
				<div class="card-body">
					<h4 class="text-center">Medicine</h4>
					<p class="text-center"><i class="fa-solid fa-pills" style="font-size: 30px;"></i></p>
					<?php
						include('dbconnection.php');

						//medicine
						$email2=$_SESSION["email"];
						$sql2="select SUM(amount) as su from expenses where email='$email2' and category='Medicine'";
						$result2=mysqli_query($con,$sql2);
						$medicine=mysqli_fetch_assoc($result2);

						//household
						$sql3="select SUM(amount) as su from expenses where email='$email2' and category='Household things'";
						$result3=mysqli_query($con,$sql3);
						$household=mysqli_fetch_assoc($result3);

						//House Rent
						$sql4="select SUM(amount) as su from expenses where email='$email2' and category='House Rent'";
						$result4=mysqli_query($con,$sql4);
						$houserent=mysqli_fetch_assoc($result4);

						//Clothing
						$sql5="select SUM(amount) as su from expenses where email='$email2' and category='Clothing'";
						$result5=mysqli_query($con,$sql5);
						$clothing=mysqli_fetch_assoc($result5);

						//Entertainment
						$sql6="select SUM(amount) as su from expenses where email='$email2' and category='Entertainment'";
						$result6=mysqli_query($con,$sql6);
						$entertainment=mysqli_fetch_assoc($result6);

						//Mobile Recharge
						$sql7="select SUM(amount) as su from expenses where email='$email2' and category='Mobile Recharge'";
						$result7=mysqli_query($con,$sql7);
						$mobile=mysqli_fetch_assoc($result7);

						//Others
						$sql8="select SUM(amount) as su from expenses where email='$email2' and category='Others'";
						$result8=mysqli_query($con,$sql8);
						$others=mysqli_fetch_assoc($result8);

						$sum=$row2["su"]+$medicine["su"]+$household["su"]+$houserent["su"]+$clothing["su"]+$entertainment["su"]+$mobile["su"]+$others["su"];

						?>
					<p class="text-center font-weight-bold"><?php echo $medicine["su"]; ?> &#8377;</p>
				</div>
			</div><br>
			<div class="card" style="background-color:orange;height:200px;width:430px;">
				<div class="card-body">
					<h2 class="text-center text-white">Income</h2>
					<?php
						include('dbconnection.php');
						$email=$_SESSION["email"];
						$sql="select SUM(amount) as su from income where email='$email'";
						$result=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($result);
						?>
					
					<p class="text-center font-weight-bold" style="font-size: 30px;"><img src="images/biggy.png" height="100" width="100"><?php echo $row["su"]-$sum; ?> &#8377;</p>
				</div>
			</div>
		</div>

		<div class="col-md-2 mt-4">
			<div class="card bg-info">
				<div class="card-body">
					<h4 class="text-center">House Rent</h4>
					<p class="text-center"><i class="fa-solid fa-house" style="font-size:30px;"></i></p>
					<p class="text-center font-weight-bold"><?php echo $houserent["su"]; ?> &#8377;</p>
				</div>
			</div><br>
			<div class="card">
				<div class="card-body bg-dark">
					<h4 class="text-center">Household</h4>
					<p class="text-center"><i class="fa-solid fa-mug-saucer" style="font-size: 30px;"></i></p>
					<p class="text-center font-weight-bold"><?php echo $household["su"]; ?> &#8377;</p>
				</div>
			</div>
		</div><br>
		<div class="col-md-2 mt-4">
			<div class="card">
				<div class="card-body bg-warning">
					<h4 class="text-center">Clothing</h4>
					<p class="text-center"><i class="fa-solid fa-shirt" style="font-size:30px;"></i></p>
					<p class="text-center font-weight-bold"><?php echo $clothing["su"]; ?> &#8377;</p>
				</div>
			</div><br>
			<div class="card bg-secondary">
				<div class="card-body">
					<h4 class="text-center">Entertainment</h4>
					<p class="text-center"><i class="fa-solid fa-tv" style="font-size: 30px;"></i></p>
					<p class="text-center font-weight-bold"><?php echo $entertainment["su"]; ?> &#8377;</p>
				</div>
			</div>
					<br>
			<div class="table-responsive" style="width:425px;">
				<h4 class="text-primary">Recent Expenses</h4>
			<table class="table table-bordered">
				<tr class="table-danger">
					<th>S.No</th>
					<th>Category</th>
					<th>Date</th>
					<th>Amount</th>
					
					
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
						<td class="text-dark"><?php echo $row["id"]; ?></td>
						<td class="font-weight-bold text-info">
							<div class="badge bg-success text-white">
							<?php echo $row["category"]; ?></td>
						</div>
						<td class="text-dark"><?php echo $row["date"]; ?></td>
						<td class="text-dark"><?php echo $row["amount"]; ?></td>
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
	
		<div class="col-md-2 mt-4">
			<div class="card" style="background-color:pink;">
				<div class="card-body">
					<h4 class="text-center">Recharge</h4>
					<p class="text-center"><i class="fa-solid fa-mobile-retro" style="font-size:30px;"></i></p>
					<p class="text-center font-weight-bold"><?php echo $mobile["su"]; ?> &#8377;</p>
				</div>
			</div><br>
			<div class="card bg-danger">
				<div class="card-body">
					<h4 class="text-center">Others</h4>
					<p class="text-center"><i class="fa-solid fa-bell" style="font-size: 30px;"></i></p>
					<p class="text-center font-weight-bold"><?php echo $others["su"]; ?> &#8377;</p>
				</div>
			</div>
		</div>

		
		
	</div>

</body>
</html>