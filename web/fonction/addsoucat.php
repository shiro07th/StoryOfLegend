<?php
include 'connect.php';


$titre= $_REQUEST['titre'];
$CatID= $_SESSION['CatID'];

$$query = "INSERT INTO post (TitreCat,Categorie,NbPost) 
  			  VALUES(?, ?,?)";
        $stmt = $pdo->prepare($query)->execute([$titre, $CatID,0]);
}
 