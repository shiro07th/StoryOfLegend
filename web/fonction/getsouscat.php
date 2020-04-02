<?php
include 'connect.php';


$cat= $_REQUEST['cat'];

$sql ="SELECT * from souscategorie WHERE Categorie = ".$cat;
$stmt = $pdo->query($sql);
foreach ($stmt as $data) {
	echo  $data['TitreCat'];
}
 