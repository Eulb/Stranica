<?php 
include"includes/header.php"; 
include"includes/connection.php"; 

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
		if($_GET['r']== 's')
		{
			?>
			<div class="alert alert-success">Category Add successfully</div>
			<?php
		}
	}
	?>
	
	<?php
	if(isset($_GET['r']))
	{
		if($_GET['r']== 'd')
		{
			?>
			<div class="alert alert-success">Category Delete successfully</div>
			<?php
		}
	}
	?>

	
 <?php
				
                if (!isset($_GET['cmd']))
                {
                $_GET['cmd'] = "";
                }
               	if($_GET["cmd"]=="delete")
				{
				if (!isset($_GET['id']))
				{
				$_GET['id'] = "";
				}
				
				$id=$_GET['id'];
				
				$sql = "DELETE From kategorije WHERE sifra=$id";
				
				$delete=$dbh->query($sql);
					
				if ($delete) {
				header('location:addcategory.php?r=d');
			} else {
				header('location:addcategory.php?r=dn');
			}
				
				?>
                
          <?php
                }
				
                ?>
				
					 	<div class="register-top-grid col-sm-10	">
					 		<form action="addcategory.php" method="post"> 
					 		<br>
							<h1 class="text-center">Add Category</h1>
							<div class="col-sm-12">
							<span>Category Name<label>*</label></span>
						<input  type="text" name="category" class="form-control">
								
								<br>
								
								<div class="clearfix"> </div>
								<br>
								<input type="submit" class="btn btn-lg btn-success" value="Add" name="upload">
							</div>
							 
				   			</form>
						</div>
	</div>
	
	</div>
		
<?php
		if(isset($_POST['upload']))
		{
			
			$sql2="INSERT INTO kategorije (naziv) VALUES ('$_POST[category]')";
			$result2=$dbh->query($sql2);
	      
			if ($result2) {
				header('location:addcategory.php?r=s');
			
			} else {
				header('location:addcategory.php?r=n');
			}
		}
			
		?>
<div class="container">
	<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           ALL CATEGORY
                        </div>
                        
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							
							<thead>
								<tr>
								  
								   <th>CATEGORY</th>
								    <th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<tr class="even gradeC">
<?php

$query4="SELECT * FROM kategorije order by  sifra desc";
$res1=$dbh->query($query4);
	if($res1->rowCount() > 0)
        {
		foreach ($res1 as $row1)
{

 ?>
	  								   <td><?php echo $row1['naziv']; ?></td>
									
									<td>
									
										<a href="addcategory.php?id=<?php  echo $row1['sifra']; ?>&cmd=delete"><img src="images/cross.png" alt="Delete Photo" width="15" height="15" border="0"></a>
										</td>
                                         
   									</td>
								</tr>
                                <?php

}
}
?>
							</tbody>
						</table>

			  </div> 
          		
			</div>
	</div>
	</div>
	</div>
<?php include"includes/footer.php"; ?>