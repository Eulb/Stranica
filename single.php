<?php include"includes/header.php"; 
include"includes/connection.php"; 
?>
	
				
<?php 
$id = $_GET['id'];
include"includes/connection.php"; 
$sql1 = "select * from rad join kategorije on kategorije.sifra= rad.kategorija join korisnik on korisnik.sifra= rad.korisnik where rad.sifra = $id";

$res=$dbh->query($sql1);
 if($res->rowCount() > 0)

{
foreach ($res as $row1)
    {
 ?>
	<div class="single">
		<div class="container">
		   <div class="single_box1">
			 <div class="col-sm-5 single_left">
				<img src="uploads/<?php echo $row1['datoteka']; ?>" class="img-responsive" alt=""/>
				
			 </div>
			 <div class="col-sm-7 col_6">
				<p class="movie_option"><strong>Category : </strong><?php echo ucwords($row1['naziv']); ?></p>
				<p class="movie_option"><strong>Upload Date : </strong><?php echo $row1['datumupload']; ?></p>
				<p class="movie_option"><strong>Uploaded By : </strong><?php echo ucwords($row1['ime'].' '.$row1['prezime']); ?></p>
				
				
				
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
				
				$id1=$_GET['id'];
				
				$sql = "delete from rad_oznaka WHERE rad=$id1";
				
				$delete=$dbh->query($sql);
				
				$sql = "delete from rad WHERE sifra=$id1";
				
				$delete=$dbh->query($sql);
					
					
					
				if ($delete) {
				header('location:index.php?r=d');
			} else {
				header('location:index.php?r=dn');
			}
				
				?>
				     <?php
                }
				
                ?>
				
				<?php 
				@session_start();
if(isset($_SESSION['userEmail']))
{
?> 
<a class="btndelete" href="single.php?id=<?php  echo $id; ?>&cmd=delete">Delete Photos</a> 
<?php
}
				?>
				
			</div>
			<div class="clearfix"> </div>
		  </div>
		
		
		    
		    

    <script type="text/javascript">
    $(document).ready(function() {
        $("input[type=button]").click(function () {
            alert("Would submit: " + $(this).siblings("input[type=text]").val());
        });
    });
    </script>
	
	<?php @session_start();
if(isset($_SESSION['userEmail']))
{ ?>
		
<?php
}
?>
    

		   	<?php
		   	include"includes/connection.php"; 
			$sql1 = "select * from rad_oznaka join oznaka on oznaka.sifra= rad_oznaka.oznaka where rad_oznaka.rad = $id";
			$res1=$dbh->query($sql1);
			 if($res1->rowCount() > 0)


			{
			foreach ($res1 as $row2)
			{

		   	?>
	        <ul class="tags_links">
				<li><a><?php echo ucwords($row2['naziv']); ?></a></li>
			</ul>
			<?php
			}
			}
			else
			{
				echo '<h4>No Keywords</h4>';
			}
			?>
			
		</div>
	</div>
	<?php } } ?>
	
	
<?php include"includes/footer.php"; ?>