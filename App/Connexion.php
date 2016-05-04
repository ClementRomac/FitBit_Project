<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 04/05/2016
 * Time: 12:09
 */
$username = "Borris";
$password = "password";

if( isset($_POST['username']) && isset($_POST['password']) ){

    if($_POST['username'] == $username && $_POST['password'] == $password){
        session_start();
        $_SESSION['user'] = $username;
        echo "ok";
    }
    else{ // Sinon
        echo "ko";
    }

}

?>
