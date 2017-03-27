<?php include"includes/header.php"; ?>

<?php
	if(isset($_GET['r']))
	{
		if($_GET['r']== 'd')
		{
			?>
			<div class="alert alert-success">Photo Deleted successfully</div>
			<?php
		}
	}
	?>
		<?php
	if(isset($_GET['r']))
	{
		if($_GET['r']== 'dn')
		{
			?>
			<div class="alert alert-success">Photo Delete failed</div>
			<?php
		}
	}
	?>

	
	<div class="banner">
		<div class="container">
			<div class="span_1_of_1">
			    <h2>Pablo Picasso<br>"Good artists copy, great artists steal."</h2>
			    
			</div>
		</div>
	</div>
	<div class="grid_1">
		<h3>Gallery</h3>
		<?php
		include"includes/connection.php"; 
		$sql = "select * from kategorije";
		$res=$dbh->query($sql);

		if($res->rowCount() > 0)
        {
		foreach ($res as $row2)
    {
		?>
		<h4 class="text-center"><?php echo ucwords($row2['naziv']); ?></h4>
		<?php
			$id = $row2['sifra'];
			$sql1 = "select * from rad where kategorija = $id";
			$res1=$dbh->query($sql1);
			
			
			if($res1->rowCount() > 0)
        {
			foreach ($res1 as $row1)
    {
				$pid = $row1['sifra']; 
				?>
				<div class="col-md-2 col_1">
					<a href="single.php?id=<?php echo $pid ?>"><img src="uploads/<?php echo $row1['datoteka']; ?>" class="img-responsive" height="500" width="200" alt=""/></a>
				</div>
				<?php
			}
			}
			else
			{
			?>
				<div class="col-md-2 col_1">
					<h6>No Images</h6>
				</div>
			<?php
			}
			?>
			<div class="clearfix"></div>
			<?php
		}
		}
		?>
		
	</div>
<?php include"includes/footer.php"; ?>