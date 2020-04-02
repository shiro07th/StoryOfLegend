<?php
include 'connect.php';
$pseudo = $_REQUEST['Pseudo'];
$mail = $_REQUEST['Mail'];
$usertype = $_REQUEST['TypeID'];
$userid = $_REQUEST['UserID'];
$GestionUser = $_SESSION['GestionUser'];

$sql = "SELECT * from usertype";
$stmt = $pdo->query($sql);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

echo '        <form method="post" action="fonction/changeUserData.php">

            <div class="row">
                <div class="col-md-6"">
                <div class="form-group">
                    <label for="pseudo"><b>Pseudo</b></label>
                    <input type="text"  class="form-control" name="pseudo" id="pseudo" value="'.$pseudo.'" name="pseudo" required/>
                    <div>

                        <div class="form-group">
                            <label for="mail"><b>E-mail</b></label>
                            <input type="email" class="form-control" name="mail" id="mail" value="'.$mail.'"name="mail" required/>
                        </div>';
if ($GestionUser!=0) {
    echo '<label for="role"><b>Rôle</b></label>
                         <select class="form-control" name="role" id="role">';

    foreach ($stmt as $data) {
        $currentid = $data['TYPEID'];
        echo '<option value="' . $currentid . '"';
        if ($usertype == $currentid) {
            echo 'selected="selected"';
        }
        echo '>' . $data['NomType'] . '</option>';
    }
    echo '</select>';
}
else{
    echo '<input type="hidden" name="role" id="role" value="' .$usertype . '" />';
}
                        echo '<input type="hidden" name="UserID" id="UserID" value="'.$userid .'" />';
                        echo '<div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Modifier" /><br>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>';