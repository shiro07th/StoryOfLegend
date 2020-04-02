<?php
include 'connect.php';


$postID= $_REQUEST['Post'];

$sql ="SELECT * from Commentaire WHERE PostID = ".$postID;
$stmt = $pdo->query($sql);
foreach ($stmt as $data) {
	echo  $data['ContenuePost'];
	
}
 