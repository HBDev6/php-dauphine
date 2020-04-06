<?php
    session_start();
    require_once 'pdo_connexion.php';
    require_once 'functions/user-functions.php';
    require_once 'functions/article-functions.php';
    $user = isUserConnected();
    $errors=[];
    $errorAndLink=[];

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $errorAndLink = uploadArticleImage();

        if(!empty($errorAndLink['fileName'])){
            addArticleDB($pdo, $errorAndLink['fileName']);
            header('Location: homepage.php');
        } else {
            $errors = $errorAndLink['errors'];
        }
    }
?>

<html>
<head>
    <?php include 'stylesheet.php';?>
</head>
<body>
<?php include 'admin-panel.php';?>
<?php include 'nav.php';?>
<h1>Hey <?php echo($user['pseudo'])?> !</h1>

    <h2>you can write your article here</h2>

    <form class="form" method="POST" action="add_article.php" enctype="multipart/form-data">
    <!-- I don't put "required" attribute to test backend features, 
    but we'll have to put them later to ensure fewer querries-->
        <label>Title</label>
        <input class="form-control" type="text" placeholder="title" name="title">
        <label>Content</label>
        <textarea class="form-control" placeholder="..." name="content"></textarea>
        <label>Picture</label>
        <input class="form-control" type="file" name="imagepath"><br>
        <input type="submit" value="submit">
    </form>

<?php 
        // var_dump($errorAndLink);
        if(!empty($errorAndLink['errors'])){
            echo('<h4 style="color: red; text-decoration:underline;"> ERRORS have been found : </h4>');
            echo('<ul style="color: red">');
            foreach($errorAndLink['errors'] as $error){
                echo('<li>'.$error.'</li>');
            }
            echo('</ul>');
        }
?>

</body>
</html>