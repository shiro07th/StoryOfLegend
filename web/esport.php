<?php
include 'head.php';
$_SESSION['CatID'] = 1;
?>

<body>
<?php
include 'header.php';
?>
<div class="main">

    <div class="container">

        <h2>Esport</h2>

        <?php
        if(isset($_SESSION['id'])): ?>

            <a class="btn btn-primary" href="ecriture.php?CatID=1">Faire un post</a>

        <?php endif;
        include ('fonction/getPostForCat.php')
        ?>



    </div>


</div>

<?php include 'footer.php';?>
</body>
</html>