<?php include"includes/header.php";
@session_start();
if(!isset($_SESSION['userEmail']))
{
header("location:index.php");
}
 ?>
	<div class="single">
		<div class="container">
			<?php
			include"includes/connection.php"; 
			$email = $_SESSION['userEmail'];
			$sql = "select * from korisnik where email='$email'";
			 $res=$dbh->query($sql);
			
			
			$userRow=$res->fetch(PDO::FETCH_ASSOC);
          if($res->rowCount() > 0)
          {
			?>
		   <div class="single_box1">
			 <div class="col-sm-5 single_left">
				<img src="uploads/<?php echo $userRow['image_src']; ?>" class="img-responsive" alt="" style="max-height:300px;"/>
			 </div>
			 <div class="col-sm-7 col_6">
			 		<form action="profile.php" method="post" enctype="multipart/form-data"> 
						
					 	<div class="register-top-grid">
							<h1>USER INFORMATION</h1>
							<div>
								<span>First Name<label>*</label></span>
								<input type="text" name="firstname" required value="<?php echo $userRow['ime']; ?>"> 
							</div>
							<div>
								<span>Last Name<label>*</label></span>
								<input type="text" name="lastname" required value="<?php echo $userRow['prezime']; ?>"> 
							</div>
							<div>
								<span>Email Address<label>*</label></span>
								<input type="text" name="email" required value="<?php echo $userRow['email']; ?>" readonly> 
							</div>
							<div>
								<span>Title<label>*</label></span>
								<input type="text" name="title" value="<?php echo $userRow['naslov']; ?>"> 
							</div>
							<div>
								<span>Image<label>*</label></span>
								<input type="file" name="file[]" > 
							</div>
							<div>
								<span>Description<label>*</label></span>
								<textarea class="form-control" name="description"><?php echo $userRow['opis']; ?></textarea>
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php
						}
						?>
						<input type="submit" class="btn btn-lg btn-success" value="Update" name="update"> 
				    </form>

				    <?php
					if(isset($_POST['update']))
					{
						extract($_POST);
						include"includes/connection.php"; 
						$email = $_SESSION['userEmail'];

						$path = "uploads/";
				        
				        $img = array();

				        for($i=0; $i<count($_FILES['file']['name']); $i++)
				        {
				            $target = "uploads/".basename($_FILES['file']['name'][$i]);
				            if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target )) 
				            {
				                $img[] = $_FILES['file']['name'][$i];
				                 $msg = "Image uploaded successfully";       
				            } 
				            else
				            {
				                header('location:artwork.php?r=not');
				            }
				        }
						$fname=$_POST['firstname'];
						$lname=$_POST['lastname'];
						$title=$_POST['title'];
						$desc=$_POST['description'];
						
						$sql = "update korisnik set ime='$fname', prezime='$lname', naslov='$Title', opis='$desc', image_src='$img[0]' where email='$email' ";
						
						 $res=$dbh->query($sql);
	
        
		  
						
						if ($res) {
							header('location:profile.php?r=updated');
						} else {
							header('location:profile.php?r=not');
						}
						
					?>
				</div>
			</div>
			<?php
			}
			?>
			<div class="clearfix"> </div>
		  </div>
		  
		</div>
	</div>
<?php include"includes/footer.php"; ?>