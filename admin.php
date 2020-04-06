<?php
    session_start(); 
    require_once 'functions/user-functions.php';
    require_once 'pdo_connexion.php';
    $user = isUserConnected();
?>

<html>
<head>
    <?php include 'stylesheet.php' ?>
</head>
<body>
<?php include 'nav.php' ?>

    <h1>welcome to ADMINISTRATION PAGE <?php echo($user['pseudo'])?> </h1>

    <h2>Add an ADMIN</h2>
    <a href="register.php">Grant access to NEW USER</a>

    <h2>Add an ARTICLE</h2>
    <a href="add_article.php">Write new ARTICLE</a>






</body>
</html>