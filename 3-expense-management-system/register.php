
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
					<h3 class="text-center text-muted font-weight-normal">-------Register-------</h3>
					<form class="form-inline" action="register.php" method="post" autocomplete="off">
						
						<input type="text" name="first_name" class="form-control mb-2 mr-sm-5 ml-3" placeholder="First Name" required>
						<input type="text" name="last_name" class="form-control mb-2 mr-sm-2" placeholder="Last Name" required>
						<div class="form-group">
							<input type="email" name="email" size="55" placeholder="Enter Your Email" class="form-control ml-3" required>
						</div>
						<div class="form-group">
							<input type="password" name="password" size="55" placeholder="Enter Your Password" class="form-control ml-3 mt-3" required>
						</div>
						<div class="form-group">
							<input type="password" name="cpassword" size="55" placeholder="Confirm Password" class="form-control ml-3 mt-3" required>
						</div>

						<div class="form-group ml-3">
                           <input name="checkbox" type="checkbox" class="form-control">&nbsp;&nbsp;I accept the Terms of use and privacy policy
                        </div>
                      
                         
					
					
				</div>
				<input type="submit" name="register" class="btn btn-danger" value="Register">
			</div>
			<p class="text-center font-weight-bold text-light" style="text-shadow:2px 2px black;">Already have an account <a href="login.php" class="text-info">login here</a></p>
		</div>
</form>
	</div>
</div>
<div class="row">
<div class="col-md-4">
	<?php
include('dbconnection.php');
if(isset($_POST["register"]))
{
if(!isset($_POST["checkbox"]))
{
echo '
<h4 id="message" class="animate__animated animate__fadeInLeft text-danger bg-light" style="border-right:5px solid red;">please accept terms and conditions</h4>
';
}
else
{
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
if($password==$cpassword)
{
	$email2=$_POST["email"];
	$sql2="select email from register where email='$email2'";
    $result=mysqli_query($con,$sql2);
    if(mysqli_num_rows($result)>0)
     {
	   echo '
          <h4 id="message" class="animate__animated animate__fadeInLeft text-danger bg-light" style="border-right:5px solid red;">Email Already Exists</h4>';	

     }
     else
     {
	$first=$_POST["first_name"];
	$last=$_POST["last_name"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$sql="insert into register (first_name,last_name,email,password) values ('$first','$last','$email','$password')";
		if(mysqli_query($con,$sql))
		{
		echo '<h4 id="message" class="animate__animated animate__fadeInLeft text-success bg-light" style="border-right:5px solid green;">Registration Successful</h4>
		';
		header("refresh:3;url=login.php");		
		}
		else
		{
		echo '
		<h4 id="message" class="animate__animated animate__fadeInLeft text-danger bg-light" style="border-right:5px solid red;">not Registered</h4>
		';	

		}
      }
}
else
{
echo '
<h4 id="message" class="animate__animated animate__fadeInLeft text-danger bg-light" style="border-right:5px solid red;">please retype password correctly</h4>
';	
}
}
}
?>

</div>
</div>
</body>
</html>