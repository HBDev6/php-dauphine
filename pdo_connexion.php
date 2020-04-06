<?php
    try {
        $host = '127.0.0.1';
        $dbName = 'dauphine-db';
        $user = 'root';
        $password = '';

        $pdo = new PDO(
        'mysql:host='.$host.';dbname='.$dbName.';charset=utf8',
        $user,
        $password);

        //enable SQL error tracking
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    throw new InvalidArgumentException('Connexion to DB failed : '.$e->getMessage());
    exit;
    }
    // echo('connexion to db granted');
?>