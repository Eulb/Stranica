<?php
        if($_SERVER["SERVER_NAME"]==="localhost"){
	$putanjaAPP="/Portfolio/";
	$hostname="localhost";
	$db="portfolio";
	//$korisnik="edunova";
	//$lozinka="edunova";
		$username="root";
	$pass="";
}else{
	$putanjaAPP="/Portfolio/";
	$hostname="sql208.byethost18.com";
	$db="b18_19195092_portfolio";
	$username="b18_19195092";
	$pass="21oceanzanju";
}

$dbh = new PDO("mysql:host=$hostname;dbname=$db",$username,$pass);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
    //echo 'Connected to Database<br/>';
	

/*$con = new PDO(
"mysql:host=" . $server . ";dbname=" . $imeBaze,
	$korisnik,
	$lozinka,
	array(
		PDO::ATTR_EMULATE_PREPARES=> false,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8",
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	)
);
*/
?>