<?php

include 'connect.php';

$pseudo = "";
$password= "";
//Vérification de l'existance des valeurs du formulaires
if (isset($_POST) ) {

    if (isset($_REQUEST['pseudo'])) {
        $pseudo = $_REQUEST['pseudo'];
    }


    if (isset($_REQUEST['pwd'])) {
        $password = $_REQUEST['pwd'];
    }
    //Recherche de l'utilisateur dans la base de données
    $stmt = $pdo->query("SELECT *  FROM users JOIN usertype ON users.UserType = usertype.TYPEID WHERE Pseudo = '" . $pseudo . "'");
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $coded_password = md5($password);

    //S'il n'existe pas où mauvais mot de passe alors on renvoi sur la page avec une erreur
    if ($data == false || $coded_password != $data['Password'] || $pseudo != $data['Pseudo']) {

        $message = 'Mauvais Login ou Mot de passe';
        header('Location: ../login.php?message=' . urlencode($message));
    } else {
    //si pas d'erreur connection de l'utilisateur
        session_start();
        $_SESSION['id'] = $data['UserID'];
        $_SESSION['GestionPost'] = $data['GestionPost'];
        $_SESSION['GestionUser'] = $data['GestionUser'];
        $_SESSION['Ecriture'] = $data['Ecriture'];
        $_SESSION['Modif'] = $data['Modif'];
        //echo $_SESSION['id'];
        header("location: ../index.php");
    }
}
?>
