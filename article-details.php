//WORKABLE AF//

<?php
    session_start();
    require_once 'functions/user-functions.php';
    require_once 'pdo_connexion.php';

$res = $pdo->prepare('SELECT * FROM library WHERE id = :id');
$res->execute(['id'=> $_GET['id']]);
$fetchRes = $res->fetch();
?>

<h1><?php echo($fetchRes['filename']) ?></h1><br>
<img src="<?php echo('assets/uploads/library/'.$fetchRes['filename']); ?>"
alt="Image<?php echo($fetchRes['filename']); ?>" > <br>

<h2><u>location : </u> <?php echo($fetchRes['location']) ?></h2>
<div><u>date : </u> <?php echo($fetchRes['date']) ?></div>
<div><u>User : </u> <?php echo($fetchRes['pseudo']) ?></div>

<a href="homepage.php">back to Library</a>

