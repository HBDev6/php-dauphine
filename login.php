<?php
    session_start();
    require_once 'functions/user-functions.php';
    require_once 'pdo_connexion.php';
    // $user = isUserConnected();

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

    <h1>Login</h1>

    <form method="POST">
        <input type="text" name="login" placeholder="pseudo or email">
        <input type="text" name="password" placeholder="password">
        <input type="submit">
    </form>

    <a class="nav-link" href="homepage.php">Back to Homepage</a>


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