<?php
$username = "Borris";
$password = "password";

if( isset($_POST['username']) && isset($_POST['password']) ){

    if($_POST['username'] == $username && $_POST['password'] == $password){
        session_start();
        $_SESSION['user'] = $username;
    }
    else
        echo "Erreur connexion";

}
