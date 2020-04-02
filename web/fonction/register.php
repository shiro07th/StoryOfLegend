<?php
include 'connect.php';

$pseudo = "";
$mail = "";
$password_1 = "";
$password_2 = "";
$errors = array();

//verification des valeurs du formulaire
if (isset($_POST) ) {

    if (isset($_REQUEST['pseudo'])) {
        $pseudo = $_REQUEST['pseudo'];
    }

    if (isset($_REQUEST['mail'])) {
        $mail = $_REQUEST['mail'];
    }
    if (isset($_REQUEST['pwd'])) {
        $password_1 = $_REQUEST['pwd'];
    }

    if (isset($_REQUEST['pwd2'])) {
        $password_2 = $_REQUEST['pwd2'];
    }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    //On cherche dans la bases de données l'existance du pseudo ou le mail
    $stmt = $pdo->query("SELECT Pseudo, Mail  FROM users WHERE Pseudo = '" . $pseudo . "' OR Mail = '" . $mail . "' LIMIT 1");
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    // si oui error
    if ($data == true) {
        if ($pseudo != $data['Pseudo']) {
            array_push($errors, "pseudo already exists");
        }
        if ($mail != $data['Mail']) {
            array_push($errors, "email already exists");
        }
    }
    // si pas d'erreur
    if (count($errors) == 0) {
        //chiffrage du mot de passe
        $password = md5($password_1);

        //Insertion de l'utilisateur dans la base de données
        $query = "INSERT INTO users (pseudo, mail, password,usertype) 
  			  VALUES(?, ?, ?,?)";
        $stmt = $pdo->prepare($query)->execute([$pseudo, $mail, $password, 3]);

        header('location: ../login.php');

    } else {

    }
}