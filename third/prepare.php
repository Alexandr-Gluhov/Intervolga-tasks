<?php

$user = 'php';
$pass = '1234';

$pdo = new PDO('mysql:host=localhost;dbname=task', $user, $pass);

if (isset($_POST['comment'])) {

    $query = $pdo->prepare("INSERT INTO comments (comment) VALUES (:comm)");
    $query->bindParam(':comm', htmlspecialchars($_POST['comment']));
    $query->execute();
    header('Location: index.php');
    die();
}
