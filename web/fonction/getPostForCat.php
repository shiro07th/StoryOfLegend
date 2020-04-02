<?php
include 'connect.php';


$catID= $_SESSION['CatID'];

$sql ="SELECT PostID, TitrePost, post.UserID ,Pseudo from post JOIN users ON users.UserID = post.UserID WHERE SousCatID = ".$catID." ORDER BY PostID DESC";
$stmt = $pdo->query($sql);
$i =0;

foreach ($stmt as $data) {
	echo ' <div class="post"><div class="row">
            <div class="col border-right">
                <a href="postPage.php?Post_id=' .$data['PostID'] .'"> '
                    .$data['TitrePost'].'
                </a>
            </div> 
            <div class="col-2""> By: 
            <a href="user.php?User_id=' .$data['UserID'] .'">'
                .$data['Pseudo']
            .'</a></div>
            </div>
            </div>';
    if (++$i == 10) break;
	
}
 