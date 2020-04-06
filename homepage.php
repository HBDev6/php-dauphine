<?php
    session_start(); //not sure of necessity
    require_once 'functions/user-functions.php';
    require_once 'pdo_connexion.php';

    if(!empty($_SESSION['user'])){
        echo($_SESSION['user']['pseudo'].' you are a powerful ADMIN ! <a class="nav-link" href="logout.php">sign out from ADMIN</a>');
    }else{
        echo('Welcome to Homepage !');
    }

?>


<html>
<head>
    <?php include 'stylesheet.php' ?>
</head>
<body>
<?php include 'nav.php' ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">TITLE</th>
                <th scope="col">author</th>
                <th scope="col">date</th>
                <th scope="col">overview</th>
            </tr>
        </thead>
        <tbody>
<?php
    $res = $pdo->query('SELECT * FROM articles');
    while ($data = $res->fetch())
    {
?>  
            <tr>
                <th scope="row"><?php echo($data['id']); ?></th>
                <td><?php echo($data['title']); ?></td>
                <td><?php echo($data['author']); ?></td>
                <td><?php echo($data['date']); ?></td>
                <td>
                    <img style="max-width: 140px;" src="<?php echo('assets/uploads/library/'.$data['imagepath']); ?>"
                    alt="image <?php echo($data['imagepath']); ?>"/>
                </td>
                <td>
                    <a title="details" href="image-detail.php?id=<?php echo($data['id']); ?>">
                    details
                    </a>
                </td>
            </tr>
<?php
    }
    $res->closeCursor();
?>
        </tbody>
    </table>