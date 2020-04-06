<?php
    session_start();
    require_once 'functions/user-functions.php';
    require_once 'pdo_connexion.php';
    $errors=[];

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $errors = login($pdo, $_POST['login'], $_POST['password']);
        if(count($errors)==0){
            header('Location: homepage.php');
        }
    }
?>

<html>
<head>
    <?php include 'stylesheet.php' ?>
</head>
<body>
    <?php include 'nav.php' ?>

    <h1>Login</h1>
    <h2>Please log first to access admin features</h2>
    <form method="POST">
        <input type="text" name="login" placeholder="pseudo or email">
        <input type="text" name="password" placeholder="password">
        <input type="submit">
    </form>

<?php 
    
    if(count($errors) > 0){
        echo('<h4 style="color: red; text-decoration:underline;"> ERRORS have been found : </h4>');
        echo('<ul style="color: red">');
        foreach($errors as $error){
            echo('<li>'.$error.'</li>');
        }
        echo('</ul>');
    }
    // var_dump($errors);
?>

</body>
</html>