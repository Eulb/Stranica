<?php include"includes/header.php"; 
@session_start();
if(!isset($_SESSION['userEmail']))
{
header("location:index.php");
}
?>

	<div class="container">
	<div class="row">
	<?php
	if(isset($_GET['r']))
	{
		if($_GET['r']== 'updated')
		{
			?>
			<div class="alert alert-success">Upload successfully</div>
			<?php
		}
	}
	?>
					 	<div class="register-top-grid col-sm-10	">
					 		<form action="artwork.php" method="post" enctype="multipart/form-data"> 
					 		<br>
							<h1 class="text-center">UPLOAD ARTWORK</h1>
							<div class="col-sm-12">
								<span>Select Category<label>*</label></span>
								<select class="form-control" name="category" required>
									<?php
									include"includes/connection.php"; 
									$email = $_SESSION['userEmail'];
									$sql = "select * from kategorije";
									$res=$dbh->query($sql);
									
									$userRow=$res->fetchAll;
									if($res->rowCount() > 0)
									{
										foreach ($res as $row1)
									{
									?>
									<option value="<?php echo $row1['sifra']; ?>"><?php echo $row1['naziv']; ?></option>
									<?php
									}
									}
									?>
								</select>
								<br>
								<span>Select Tag<label>*</label></span>
								<select class="form-control" name="tags[]" required multiple>
									<?php
									include"includes/connection.php"; 
									$email = $_SESSION['userEmail'];
									$sql = "select * from oznaka";
									$res=$dbh->query($sql);
									
									$userRow=$res->fetchAll;
									if($res->rowCount() > 0)
									{
									foreach ($res as $row1)
									{
									?>
									<option value="<?php echo $row1['sifra']; ?>"><?php echo $row1['naziv']; ?></option>
									
									<?php
									}}
									?>
								</select>
								
	
  
  	
								<br>
								<span>Select File<label>*</label></span>
								<input type="file" name="file[]" required>	
								<div class="clearfix"> </div>
								<br>
								<input type="submit" class="file-upload" value="Upload" name="upload">
							</div>
							 
				   			</form>
						</div>
	</div>
	</div>
<?php include"includes/footer.php"; ?>

<?php
		if(isset($_POST['upload']))
		{
			extract($_POST);

			include"includes/connection.php"; 
			$email = $_SESSION['userEmail'];
			$id = $_SESSION['userId'];
			$path = "uploads/";
	        
	        $img = array();
	        for($i=0; $i<count($_FILES['file']['name']); $i++)
	        {
	            $target = "uploads/".basename($_FILES['file']['name'][$i]);
	            //$image = $_FILES['image']['name'];
	            //$extension = explode('.', basename( $_FILES['file']['name'][$i]));
	            //$path = $path . md5(uniqid()) . "." . $extension[count($extension)-1]; 
	            if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target )) 
	            {
	                $img[] = $_FILES['file']['name'][$i];
	                 $msg = "Image uploaded successfully";       
	            } 
	            else
	            {
	                //header('location:artwork.php?r=not');
	            }
	        }
	       	
	        $date = date('Y-m-d h:i:s');
	       $cat=$_POST['category'];
		   $tag=$_POST['tags'];

			$sql = "insert into rad values('', '$img[0]', '$date', '$date', '$id', '$cat' )";
			
			$res=$dbh->query($sql);
			$rad = $dbh->lastInsertId(); 
			
			for($i = 0; $i<sizeof($tag); $i++)
			{
				$v = $tag[$i];
				$s = "insert into rad_oznaka values('$rad', '$v')";
			
				$dbh->query($s);
			}
			
			if ($res) {
				header('location:artwork.php?r=updated');
			} else {
				header('location:artwork.php?r=not');
			}
		}
			
		?>