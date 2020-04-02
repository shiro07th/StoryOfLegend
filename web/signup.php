<?php
include 'head.php';
?>

<body class="article-only">
<?php
include 'header.php';
?>
<div class="main">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            </div>
        </div>
        <h2>Inscription</h2>
        <form method="post" action="fonction/register.php">

            <div class="row">
                <div class="col-md-6"">
                <div class="form-group">
                    <label for="pseudo"><b>Login</b></label>
                    <input type="text"  class="form-control" name="pseudo" id="pseudo" placeholder="Enter Username" name="pseudo" required/>
                    <div>

                        <div class="form-group">
                            <label for="mail"><b>E-mail</b></label>
                            <input type="email" class="form-control" name="mail" id="mail" placeholder="Enter Email" name="mail" required/>
                        </div>
                        <div class="form-group">
                            <label for="password"><b>Mot de passe</b></label>
                            <input type="password" class="form-control" name="pwd" id="pwd1" placeholder="Enter Password" name="psw" required/>
                        </div>
                        <div class="form-group">
                            <label for="password2"><b>Retapper Mot de passe</b></label>
                            <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Repeat Password" name="psw_repeat" required/>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Valider" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


</div>

<?php include 'footer.php';?>
</body>
</html>