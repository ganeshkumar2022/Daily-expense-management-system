<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Page</title>
	<link rel="icon" href="images/logo.png" type="image/png">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
<?php
include('header.php');
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-5 offset-md-3 ">
			<div class="card">
				<div class="card-body">
					<h3 class="text-center text-muted font-weight-normal">-------LOGIN-------</h3>
					<form class="form-inline" action="login.php" method="post" autocomplete="off">
                     	<div class="form-group">
							<input type="email" name="email" size="55" placeholder="Enter Your Email" class="form-control ml-3" required>
						</div>
						<div class="form-group">
							<input type="password" name="password" size="55" placeholder="Enter Your Password" class="form-control ml-3 mt-3" required>
						</div>
				</div>
				<input type="submit" name="login" class="btn btn-primary" value="Login">
			</div>
			<p class="text-center font-weight-bold text-light" style="text-shadow:2px 2px black;">Don't have an accont <a href="register.php" class="text-info">Register here</a></p>
		</div>
</form>
	</div>
</div>
<div class="row">
<div class="col-md-4">
	<?php
include('dbconnection.php');
if(isset($_POST["login"]))
{
	$email2=$_POST["email"];
	$password2=$_POST["password"];
	$sql2="select * from register where email='$email2' and password='$password2'";
    $result=mysqli_query($con,$sql2);
    if(mysqli_num_rows($result)>0)
     {

	   	$_SESSION["email"]=$_POST["email"];
	   	header("Location:dashboard.php");

     }
     else
     {
        echo '
          <h4 id="message" class="animate__animated animate__fadeInLeft text-danger bg-light" style="border-right:5px solid red;">Email or Password incorrect</h4>';
     }
}
?>

</div>
</div>
</body>
</html>