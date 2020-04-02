<?php
include 'connect.php';

session_start();

if(isset($_SESSION['id'])) {

    $UserId= $_SESSION['id'];

    if (isset($_REQUEST['PostID'])) {
        $PostID = $_REQUEST['PostID'];
    }
    if (isset($_REQUEST['Contenu'])) {
        $Contenu = $_REQUEST['Contenu'];
    }


    $query = "INSERT INTO Commentaire (PostID, UserId, ContenuPost) 
  			  VALUES(?,?,?)";
    $stmt = $pdo->prepare($query)->execute([$PostID, $UserId, $Contenu]);

    header('location: ../postPage.php?Post_id=' . $PostID);
}