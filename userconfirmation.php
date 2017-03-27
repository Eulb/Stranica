<?php
include"includes/connection.php"; 
if(isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['email'])&&isset($_GET['pass']))
{


$fname=$_GET['fname'];
$lname=$_GET['lname'];
$eml=$_GET['email'];
$pass=$_GET['pass'];
		


$sql = "INSERT INTO korisnik VALUES ('', '$fname', '$lname', '$eml', '$pass', '', '', '')";

		//$res = mysqli_query($con, $sql);
		 $res=$dbh->query($sql);
		if ($res) {
		echo "You have verified your mail ID";
		}

}

?>