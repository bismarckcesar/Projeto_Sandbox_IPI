<?php
require_once('../model/conect.php');
require_once('init.php');

$email = $_POST['email'];
$password=sha1(trim($_POST['password']));


$stmt = $con->prepare(" SELECT * FROM `NUTRITIONISTS`  WHERE (`EMAIL` = ? AND `PASSWORD` = ?)");
$stmt->execute([$email, $password]);
$usersession = $stmt->fetch(PDO::FETCH_ASSOC);

if($usersession){
    $_SESSION['user'] = $usersession['NAME'];
    $_SESSION['user_id'] = $usersession['ID'];
    header('location: ../view/home.php');
    exit();
}

$stmt = $con->prepare(" SELECT * FROM `PATIENTS`  WHERE (`EMAIL` = ? AND `PASSWORD` = ?)");
$stmt->execute([$email, $password]);
$usersession = $stmt->fetch(PDO::FETCH_ASSOC);

if($usersession){
    $_SESSION['user'] = $usersession['NAME'];
    $_SESSION['user_id'] = $usersession['ID'];
    header('location: ../view/home.php');
    exit();
}

header('location: ../view/loginForm.php?message=E-mail ou senha incorretos&validate=danger');

?>