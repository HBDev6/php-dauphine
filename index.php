<?php
    session_start();
    if($_SESSION['user']){
        header('Location: admin.php');
        // header('Location: homepage.php');
    }else{
        header('Location: homepage.php');
        // header('Location: login.php');
    }

?>