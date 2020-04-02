<?php
include 'connect.php';

$UserID = $_GET['User_id'];
$GestionUser = $_SESSION['GestionUser'];


$sql = "SELECT UserID,Pseudo,Mail, NomType,UserType from users JOIN usertype ON users.UserType = usertype.TYPEID WHERE UserID=".$UserID;
$stmt = $pdo->query($sql);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
echo '<h2>Profil</h2>';

echo '<div class="row">';
    echo '<div class="col">';
        echo 'Pseudo: '.$data['Pseudo'];
    echo '</div>';

echo '</div>';

echo '<div class="row">';
    echo '<div class="col">';
        echo 'Mail: '.$data['Mail'];
    echo '</div>';
echo '</div>';

echo '<div class="row">';
    echo '<div class="col">';
        echo 'Rôle: '.$data['NomType'];
    echo '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="col">';
echo '</div>';
echo '<div class="col-2">';
if (($GestionUser!=0) OR ($UserID == $_SESSION['id'])) {
    echo '<form method="post" action="modifUser.php">
            <input type="hidden" name="Pseudo" id="Pseudo" value="' . $data['Pseudo'] . '" />
            <input type="hidden" name="Mail" id="Mail" value="' . $data['Mail'] . '" />
            <input type="hidden" name="TypeID" id="TypeID" value="' . $data['UserType'] . '" />
            <input type="hidden" name="UserID" id="UserID" value="' . $data['UserID'] . '" />
            <button type="submit" class="btn btn-primary">Modifier</button>';
}

echo '</div>';
echo '</div>';