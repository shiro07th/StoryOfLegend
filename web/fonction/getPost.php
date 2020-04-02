<?php
include 'connect.php';



if (isset($_GET['Post_id']) )

{
    $post= $_GET['Post_id'];
    $sql = "SELECT ContenuPost,TitrePost, post.UserID, Pseudo from post JOIN users ON users.UserID = post.UserID WHERE PostID = " . $post;
    $stmt = $pdo->query($sql);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<h2>' .$data['TitrePost'] .'</h2>';
    echo ' <div class="post"><div class="row">';
    echo '<div class="col-2 border-right">
                <a href="user.php?User_id=' . $data['UserID'] . '"> ' . $data['Pseudo'] . '</a>
          </div> 
          <div class="col">'
        . nl2br($data['ContenuPost'])
        . '</div>';
    echo '</div></div>';
    $sql = "SELECT ContenuPost, commentaire.UserID, Pseudo from commentaire JOIN users ON users.UserID = commentaire.UserID WHERE PostID = " . $post;
    $stmt = $pdo->query($sql);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    foreach ($stmt as $data) {
        echo ' <div class="commentaire"> <div class="row"> ';
        echo '<div class="col-2 border-right">
                <a href="user.php?User_id=' . $data['UserID'] . '"> ' . $data['Pseudo'] . '</a>
          </div> 
          <div class="col"><div class="text">'
            . nl2br($data['ContenuPost'])
            . '</div></div>';
        echo '</div></div>';

    }
}
 