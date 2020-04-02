<?php
include 'head.php';
?>

<body>
<?php
include 'header.php';
?>
<div class="main">

    <div class="container">
        <?php
        include ('fonction/getPost.php');
        ?>

        <?php
        if(isset($_SESSION['id'])): ?>

            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#repondrebottom">Repondre</button>
            <div id="repondrebottom" class="collapse">
                <form method="post" action="fonction/addcom.php">
                    <div class="form-group">
                        <br>
                        <textarea class="form-control" name="Contenu" id="Contenu" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Valider" />
                    </div>
                    <?php
                    echo '<input type="hidden" name="PostID" id="PostID" value="'.$_GET['Post_id'].'" />'
                    ?>
                </form>
            </div>
        <?php endif;?>

    </div>


</div>

<?php include 'footer.php';?>
</body>
</html>