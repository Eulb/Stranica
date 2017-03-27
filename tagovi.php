<?php


$uvjet = "%" . $_GET["q"] . "%";

//kreiraš upit s uvjetom i echo svih rezultata
$q = "select * from rad_oznaka join oznaka on oznaka.sifra= rad_oznaka.oznaka where rad_oznaka.rad = $id";
$result = mysql_query($q, $dbh);


$rezultati = array();


$t = new stdClass();
$t->id=1;
$t->name="Pejzaž";

$rezultati[]=$t;


$t = new stdClass();
$t->id=2;
$t->name="Picasa";

$rezultati[]=$t;

echo json_encode($rezultati);