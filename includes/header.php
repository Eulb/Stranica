<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Portfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script src="js/menu_jquery.js"></script> 

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
	
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="src/jquery.tokeninput.js"></script>

    <link rel="stylesheet" href="styles/token-input.css" type="text/css" />
    <link rel="stylesheet" href="styles/token-input-facebook.css" type="text/css" />
	
</head>
<body>
	<div class="header">	
      <div class="container"> 
  	     <div class="logo">
			<h1><a href="index.php">Pablo Picasso</a></h1>
		 </div>
		 <div class="top_right">
		   <ul>
		   <?php
		   if(!isset($_SESSION['userEmail']))
		   {
		   ?>
		   
		   <li class="about" >
				 <div id="aboutContainer"><a href="about.php" id="aboutButton"><span>About</span></a>
				 </div>
		   </li>
		   
		   <li class="contact" >
				 <div id="contactContainer"><a href="contact.php" id="contactButton"><span>Contact</span></a>
				 </div>
		   </li>
			
			<li class="login" >
				 <div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
					  <div id="loginBox">                
						  <form id="loginForm" action="index.php" method="post">
			                <fieldset id="body">
			                	<fieldset>
			                          <label for="email">Email Address</label>
			                        <input type="text" name="email" id="email" required>
			                    </fieldset>
			                    <fieldset>
			                            <label for="password">Password</label>
			                            <input type="password" name="password" id="password" required>
			                     </fieldset>
			                    <input type="submit" id="login" value="Sign in" name="login">
			                </fieldset>
			                
						   </form>
				        </div>
			      </div>
			  </li>
			<?php
			}
			else
			{
				?>
				<li><a href="artwork.php">Upload Artwork</a></li>
				<li><a href="addcategory.php">Add Category</a></li>
				<li><a href="addtags.php">Add Tags</a></li>
				<li><a href="register.php">Register</a></li>|
				<li><a href="logout.php">Logout</a></li>
				<?php
			}
			?>
		   </ul>
	     </div>
		 <div class="clearfix"></div>
		</div>
	</div>

<?php
if(isset($_POST['login']))
{
	extract($_POST);
	include"includes/connection.php"; 

try {
$paa=$_POST['password'];
$em=$_POST['email'];
    $sql = "SELECT * FROM korisnik where lozinka='$paa' and email='$em' ";
	 $res=$dbh->query($sql);
	
          $userRow=$res->fetch(PDO::FETCH_ASSOC);
          if($res->rowCount() > 0)
          {
            $userid = $userRow['sifra'];
			 $_SESSION['userEmail'] = $em;
			$_SESSION['userId'] = $userid;
			header('location:profile.php');
          }
		else{
			 header('location:index.php?log=fail');
		}
	
    $dbh = null;
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }


}
?>