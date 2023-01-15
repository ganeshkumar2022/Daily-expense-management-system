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
			<h3 class="text-primary">Edit Expenses details</h3>
					<?php
				include('dbconnection.php');
				$id=$_GET["id"];
				$sql="select * from expenses where id='$id'";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_assoc($result);
				?>
				<form action="expense_edit.php?id=<?php echo $id; ?>" method="post" autocomplete="off">
					 <div class="form-group">
					    <label for="category" class="font-weight-bold">Expense Category:</label>
					    <input type="text" class="form-control" name="category" value="<?php echo $row['category']; ?>" id="email">
					  </div>
					  <div class="form-group" class="font-weight-bold">
					    <label for="date">Enter Amount:</label>
					    <input type="text" class="form-control" name="amount" value="<?php echo $row['amount']; ?>" id="email">
					  </div>
					  <div class="form-group" class="font-weight-bold">
					    <label for="date">Enter date:</label>
					    <input type="date" class="form-control" name="date" value="<?php echo $row['date']; ?>" id="email">
					  </div>
					  <input type="submit" name="submit" class="btn btn-primary" value="Update Details">
				</form>			
					
	</div>
<?php
				include('dbconnection.php');
                if(isset($_POST["submit"]))
                {
                $amount=$_POST["amount"];
                $date=$_POST["date"];
                $category=$_POST["category"];
                $id=$_GET["id"];
                $sql="update expenses set amount='$amount',date='$date',category='$category' where id='$id'";
                if(mysqli_query($con,$sql))
                {
                	echo '
                   <h5 id="message" class="animate__animated animate__fadeInRight text-white bg-success" style="border-left:5px solid red;height:35px;">Updated successfully.....</h5>';
                   header("refresh:2;url=manage_expense.php");

                }
                else
                {

                	echo '
                   <h5 id="message" class="animate__animated animate__fadeInRight text-light bg-danger" style="border-left:5px solid red;height:30px;">Updated error.....</h5>';
                }
                }



			?>
</body>
</html>