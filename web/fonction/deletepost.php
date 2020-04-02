<?php
include 'connect.php';


$post= $_REQUEST['Post'];

$sql ="DELETE FROM post WHERE PostID = ".$post;
$stmt = $pdo->query($sql);
