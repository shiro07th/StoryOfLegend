<?php
include 'head.php';
$_SESSION['CatID'] = 2;
?>

<body>
<?php
include 'header.php';
?>
<div class="main">

    <div class="container">

        <h2>League of Legends</h2>

        <?php
        if(isset($_SESSION['id'])): ?>

            <a class="btn btn-primary" href="ecriture.php?CatID=2">Faire un post</a>

        <?php endif;
        include ('fonction/getPostForCat.php')
        ?>



    </div>


</div>

<?php include 'footer.php';?>
</body>
</html>