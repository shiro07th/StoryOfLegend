<?php
include 'head.php';
?>

<body class="no-nav">
<?php
include 'header.php';
?>
<div class="main">
    <div class ="container">
        <div class="row">
            <div class="col-md-5"">
            <h2>Login</h2>

            <form method="post" action="fonction/verif_login.php">
                <div class="form-group">
                    <label><b>Pseudo</b></label>
                    <input type="text" class="form-control" placeholder="Entrer Pseudo" name="pseudo" required>
                </div>

                    <div class="form-group">
                        <label ><b>Mot de passe</b></label>
                        <input type="password" class="form-control" placeholder="Entrer Mot de passe" name="pwd" required>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <div class="container" >
                        <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                    <?php

                    if (isset($_GET) && !empty($_GET['message'])) {
                        ?>
                        <div class="col-12" style="color:red; margin-top:20px; margin-bottom: 20px;">
                            <?php echo($_GET['message']); ?>
                        </div>
                        <?php
                    }
                    ?>

            </form>
        </div>
        <div class="offset-md-3 col-md-4">
            <div class="disappear">
                <h2>Pas inscrit?</h2>
                <a href="signup.php"><button type="button" class="btn btn-primary">S'inscrire</button></a>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>

</body>
</html>