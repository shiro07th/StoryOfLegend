<?php
include 'connect.php';
$errors = array();
if (isset($_REQUEST['pseudo'])) {
    $pseudo = $_REQUEST['pseudo'];
}

if (isset($_REQUEST['mail'])) {
    $mail = $_REQUEST['mail'];
}
if (isset($_REQUEST['role'])) {
    $role = $_REQUEST['role'];
}
if (isset($_REQUEST['UserID'])) {
    $UserId = $_REQUEST['UserID'];
}

$stmt = $pdo->query("SELECT *  FROM users WHERE (Pseudo = '" . $pseudo . "' OR Mail = '" . $mail . "') AND (UserID!='".$UserId ."') LIMIT 1");
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($data == true) {
    if ($pseudo != $data['Pseudo']) {
        array_push($errors, "pseudo already exists");
    }
    if ($mail != $data['Mail']) {
        array_push($errors, "email already exists");
    }
}
if (count($errors) == 0) {
    $query = "UPDATE users SET Pseudo=?, Mail=?, UserType=? WHERE UserId=?";
    $stmt = $pdo->prepare($query)->execute([$pseudo, $mail, $role, $UserId]);
    header('location: ../user.php?User_id='.$UserId);
}
else{
    $message = 'Mail ou Pseudo deja pris';
    //header('Location: ../index.php?message=' . urlencode($message));

    foreach ($errors as $value)
    {
        echo $value;
    }
}


