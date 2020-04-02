<?php
include 'head.php';
?>

<body class="article-only">
<?php
include 'header.php';
?>
<div class="main">

    <div class="container">

        <h2>Ecrire le post</h2>
        <form method="post" action="fonction/addPost.php">
            <div class="form-group">
                <label for="titre">Titre du Post</label>
                <input type="text" class="form-control" name="titre" id="titre" required>
            </div>

            <div class="form-group">
                <label for="text">Contenu du Post</label>
                <textarea class="form-control" name="text" id="text" rows="6" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Valider" />
            </div>
            <?php
                echo '<input type="hidden" name="CatID" id="CatID" value="'.$_SESSION['CatID'].'" />'
            ?>
        </form>

    </div>


</div>

<?php include 'footer.php';?>
</body>
</html>