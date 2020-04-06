<?php
    session_start();
    require_once 'pdo_connexion.php';
    require_once 'functions/user-functions.php';
    require_once 'functions/article-functions.php';
    $errors=[];
    $errorAndLink=[];
    $user = isUserConnected();

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $errorAndLink = uploadArticle();
        if($errorAndLink['fileName']){
            addArticleDB($pdo, $errorAndLink['fileName']); //instead of "$fileName"
            header('Location: admin.php');
        } else {
            $errors = $errorAndLink['errors'];
        }
    }
?>

<html>
<head>
    <?php include 'stylesheet.php' ?>
</head>
<body>
<?php include 'nav.php' ?>

    <h1>you can add a picture here <?php echo($user['pseudo'])?> </h1>

    <form method="POST" enctype="multipart/form-data">
        <label>PICTURE</label>
        <input class="form-control" type="file" name="Article"><br>
        <label>location by data</label>
        <input class="form-control" type="text" id="locationInput" name="location" placeholder="location"><br>
        <input type="submit">
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
<?php
    include 'javascript.php';
?>
<script src="assets/js/geolocator.js"></script>
</html>