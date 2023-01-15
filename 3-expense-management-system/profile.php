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
			<h3 class="text-primary">Edit Profile details</h3>
					<?php
				include('dbconnection.php');
				$email=$_SESSION["email"];
				$sql="select * from register where email='$email'";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_assoc($result);
				?>
				<form action="profile.php" method="post" autocomplete="off">
					 <div class="form-group">
					    <label for="first" class="font-weight-bold">First Name</label>
					    <input type="text" class="form-control" name="first" value="<?php echo $row['first_name']; ?>" id="email">
					  </div>
					  <div class="form-group" class="font-weight-bold">
					    <label for="last" class="font-weight-bold">Last Name</label>
					    <input type="text" class="form-control" name="last" value="<?php echo $row['last_name']; ?>" id="email">
					  </div>
					  <div class="form-group" class="font-weight-bold">
					    <label for="password" class="font-weight-bold">Password</label>
					    <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>" id="email">
					  </div>
					 
					  <input type="submit" name="submit" class="btn btn-primary" value="Edit Details">
				</form>			
					
	</div>
<?php
				include('dbconnection.php');
                if(isset($_POST["submit"]))
                {
                $amount=$_POST["first"];
                $date=$_POST["last"];
                $category=$_POST["password"];
                
                $email2=$_SESSION["email"];
                $sql="update register set first_name='$amount',last_name='$date',password='$category' where email='$email'";
                if(mysqli_query($con,$sql))
                {
                	echo '
                   <h5 id="message" class="animate__animated animate__fadeInRight text-white bg-success" style="border-left:5px solid red;height:35px;">Profile Updated successfully.....</h5>';
                   header("refresh:2;url=profile.php");

                }
                else
                {

                	echo '
                   <h5 id="message" class="animate__animated animate__fadeInRight text-light bg-danger" style="border-left:5px solid red;height:30px;">Profile Updated error.....</h5>';
                }
                }



			?>
</body>
</html>