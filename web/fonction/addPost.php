<?php
include 'connect.php';

session_start();
// on recupère l'id de l'utilisateur ainsi que les informations du poste poste
if(isset($_SESSION['id']))
{
    $UserId= $_SESSION['id'];
    if(isset($_REQUEST['titre']))
    {
        $titre = $_REQUEST['titre'];
    }
    if(isset($_REQUEST['text']))
    {
        $text= $_REQUEST['text'];
    }
    if(isset($_REQUEST['CatID']))
    {
        $CatID= $_REQUEST['CatID'];
    }


    //on le rentre les information dans la bases de données
    $query = "INSERT INTO post (TitrePost, UserId, ContenuPost,SousCatID) 
  			  VALUES(?, ?, ?,?)";
    $stmt = $pdo->prepare($query)->execute([$titre, $UserId, $text, $CatID]);
    header('location: ../postPage.php?Post_id='.$pdo->lastInsertId());

}
else
{
    header('location: ../login.php');
}


 