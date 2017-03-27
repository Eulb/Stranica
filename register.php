<?php include"includes/header.php"; 
@session_start();
if(!isset($_SESSION['userEmail']))
{
header("location:index.php");
}
?>
	<div class="register">
		<div class="container">
		
		   <form action="" method="post"> 
				 <div class="register-top-grid">
					<h1>PERSONAL INFORMATION</h1>
					 <div>
						<span>First Name<label>*</label></span>
						<input type="text" name="firstname" required> 
					 </div>
					 <div>
						<span>Last Name<label>*</label></span>
						<input type="text" name="lastname" required> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="text" name="email" required> 
					 </div>
					 <div class="clearfix"> </div>
					 </div>
					 <div class="clearfix"> </div>
				     <div class="register-bottom-grid">
						    <h4>LOGIN INFORMATION</h4>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" required>
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="confirm" required>
							 </div>
							 <div class="clearfix"> </div>
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">
				   
					   <input type="submit" value="Register" name="register" >
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
	</div>
<?php include"includes/footer.php"; ?>

<?php

if(isset($_POST['register']))
{

	//extract($_POST);
	/*
	include"includes/connection.php"; 
	
	if($password == $confirm)
	{
		$fname=$_POST['firstname'];
		$lname=$_POST['lastname'];
		$eml=$_POST['email'];
		$pass=$_POST['password'];
		$sql = "INSERT INTO korisnik VALUES ('', '$fname', '$lname', '$eml', '$pass', '', '', '')";

		//$res = mysqli_query($con, $sql);
		 $res=$dbh->query($sql);
		if ($res) {
	   		header('location:register.php?r=registered');
		} else {
			header('location:register.php?r=not');
		}
	}
	else
	{
		header('location:register.php?r=passerr');
	}
	*/
	
		$fname=$_POST['firstname'];
		$lname=$_POST['lastname'];
		$eml=$_POST['email'];
		$pass=$_POST['password'];
		
		
$subject = "Email Verification mail";
$headers = "From: portfolio@gmail.com \r\n";
$headers .= "Reply-To: portfolio@gmail.com \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message.='<div style="width:550px; background-color:#CC6600; padding:15px; font-weight:bold;">';
$message.='Email Verification mail';
$message.='</div>';
$message.='<div style="font-family: Arial;">Confiramtion mail have been sent to your email id<br/>';
$message.='click on the below link in your verification mail id to verify your account ';
$message.="<a href='http://eulb.byethost18.com/user-confirmation.php?fname=$fname&lname=$lname&email=$eml&pass=$pass'>click</a>";
$message.='</div>';
$message.='</body></html>';

mail($eml,$subject,$message,$headers);
	
}

?>