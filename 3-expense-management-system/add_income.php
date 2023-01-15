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
			<div class="card mt-4">
				<h3 class="text-info">Add Income</h3>
				<div class="card-body">
					<form action="add_income.php" method="post" autocomplete="off">
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Amount:</label>
					  <input type="number" name="amount" class="form-control" id="usr" required>
					</div>
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Date:</label>
					  <input type="date" name="date" class="form-control" id="usr" required>
					</div>
					<div class="form-group">
					  <label for="usr" class="font-weight-bold">Enter Description:</label>
					  <input type="text" name="des" class="form-control" id="usr" required>
					</div>
				
				</div>
				<button type="submit" class="btn btn-success text-white" name="add_expense">Add Income</button>
				
			</div>
			</div>
			<?php
				include('dbconnection.php');
                if(isset($_POST["add_expense"]))
                {
                $amount=$_POST["amount"];
                $date=$_POST["date"];
                $category=$_POST["des"];
                $email=$_SESSION["email"];
                $sql="insert into income (email,amount,date,description) values ('$email',$amount,'$date','$category')";
                if(mysqli_query($con,$sql))
                {
                	echo '
                   <h5 id="message" class="animate__animated animate__fadeInRight text-white bg-primary" style="border-left:5px solid red;height:35px;">Income Added successfully.....</h5>';

                }
                else
                {

                	echo '
                   <h5 id="message" class="animate__animated animate__fadeInRight text-light bg-primary" style="border-left:5px solid red;height:30px;">Income not added.....</h5>';
                }
                }



			?>
		  
	    </form>
	</div>

</body>
</html>