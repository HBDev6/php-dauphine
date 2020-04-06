<?php
    session_start();
    require_once 'functions/user-functions.php';
    require_once 'pdo_connexion.php';

$res = $pdo->prepare('SELECT * FROM articles WHERE id = :id');
$res->execute(['id'=> $_GET['id']]);
$fetchRes = $res->fetch();
?>

<html>
<head>
    <?php include 'stylesheet.php';?>
</head>
<body>
<?php include 'nav.php';?>

<h1><?php echo($fetchRes['title']) ?></h1><br>
<hr>
<div class="center">

    <?php
        if(!empty($fetchRes['imagepath'])){
            echo('<img src="assets/uploads/library/'.$fetchRes['imagepath'].'">');
        }else{
            echo('<h1>no image found :(</h1>');
        }
    ?>

    <hr>
    <u>content:</u><br><p><?php echo($fetchRes['content'])?></p><br>
    <hr>
    <u>date:</u><br><?php echo($fetchRes['date'])?><br>
    <u>Author:</u><br><?php echo($fetchRes['author'])?><br>
</div>
</body>
</html>
