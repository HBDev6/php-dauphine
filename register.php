<?php
    session_start();
    require_once 'functions/user-functions.php';
    require_once 'pdo_connexion.php';
    $errors=[];
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $errors = validateFormUser();

        if(count($errors)===0){
            $errors = registerUser($pdo, $errors);
            if(count($errors) === 0){
                header('Location: login.php');
            }
        }
    }
?>

<html>
<head>
    <?php include 'stylesheet.php' ?>
</head>
<body>
    <?php include 'admin-panel.php';?>
    <?php include 'nav.php';?>

    <h1>Admit new USER as an ADMIN</h1>

    <form method="POST" action="register.php">
    <!-- I don't put "required" attribute to test backend features, 
    but we'll have to put them later to ensure fewer querries-->
        <input type="text" placeholder="pseudo" name="pseudo" >
        <input type="text" placeholder="email" name="email">
        <input type="text" placeholder="first name" name="firstname">
        <input type="text" placeholder="last name" name="lastname">
        <input type="text" placeholder="password" name="password">
        <input type="submit">
    </form>

    <a href="login.php">go to login</a>

<?php 
    if(count($errors) != 0){
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