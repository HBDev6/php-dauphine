<?php
// session_start(); 
//doesn't work -> get a warning : already had a session

function isUserConnected(){
    if($_SESSION['user']){
        return $_SESSION['user'];
    } else {
        header('Location: login.php');
    }
}

function login($pdo, $login, $password){   
    $errors = [];    
    try{
        $req = $pdo->prepare(
            'SELECT * FROM users 
            where (email = :email OR pseudo = :pseudo) 
            AND password = :password');
        $req->execute([
            'email' => $login,
            'pseudo' => $login,
            'password' => md5($password)
        ]);
    } catch (PDOException $exception){
        var_dump($exception);
        die();
    }   
    $res = $req->fetch();
    if($res === false){
        $errors[]='unknown user';
        session_destroy();
    } else {
        $_SESSION['user'] = $res;
    }
    // var_dump($errors);
    return $errors;
}

function registerUser($pdo, $errors){
    try{
        $req = $pdo->prepare(
            'INSERT INTO users(pseudo, email, firstname , lastname, password)
            VALUES(:pseudo, :email, :firstname, :lastname, :password)');
        $req->execute([
            'pseudo' => $_POST['pseudo'],
            'email' => $_POST['email'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'password' => md5($_POST['password'])
        ]);
    } catch (PDOException $exception){
        if(($exception->getcode())==='23000'){
            $errors[] = 'email already use';
        }
    }
    return $errors;
}

function validateFormUser(){
    $errors = [];
    if(empty($_POST['pseudo'])){
        $errors[]='pseudo : no input';
    }
    if(empty($_POST['email'])){
        $errors[]='email : no input';
    }
    if(empty($_POST['firstname'])){
        $errors[]='firstname : no input';
    }
    if(empty($_POST['lastname'])){
        $errors[]='lastname : no input';
    }
    if(empty($_POST['password'])){
        $errors[]='password : no input';
    }
    return $errors;
}
?>
