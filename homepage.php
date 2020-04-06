<?php
    session_start();
    require_once 'functions/user-functions.php';
    require_once 'pdo_connexion.php';
?>

<html>
<head>
    <?php include 'stylesheet.php' ?>
</head>
<body>

<?php 
    if(!empty($_SESSION['user'])){
        include 'admin-panel.php';
    }
    include 'nav.php' 
?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">TITLE</th>
                <th scope="col">author</th>
                <th scope="col">date</th>
                <th scope="col">overview</th>
                <th scope="col">VIEW ARTICLE</th>
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
                    alt="no image available"/>
                </td>
                <td>
                    <a title="details" href="article-detail.php?id=<?php echo($data['id']); ?>">
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