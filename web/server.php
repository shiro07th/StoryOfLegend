<?php
session_start();

// initializing variables
$pseudo = "";
$email    = "";
$errors = array();


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $pseudo = mysqli_real_escape_string($mydb, $_POST['pseudo']);
    $email = mysqli_real_escape_string($mydb, $_POST['email']);
    $password_1 = mysqli_real_escape_string($mydb, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($mydb, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($pseudo)) { array_push($errors, "pseudo is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same pseudo and/or email
    $user_check_query = "SELECT * FROM users WHERE pseudo='$pseudo' OR mail='$email' LIMIT 1";
    $result = mysqli_query($mydb, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['pseudo'] === $pseudo) {
            array_push($errors, "pseudo already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (pseudo, mail, password) 
  			  VALUES('$pseudo', '$email', '$password')";
        mysqli_query($mydb, $query);
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}