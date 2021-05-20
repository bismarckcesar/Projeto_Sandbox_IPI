<?php
require_once '../model/conect.php';
require_once 'init.php';

$email = $_POST['email'];
$password=sha1($_POST['password']);


$stmt = $con->prepare(" SELECT * FROM `NUTRITIONISTS`  WHERE (`EMAIL` = ? AND `PASSWORD` = ?)");
$stmt->execute([$email,$password]);
$usersession = $stmt ->fetchAll();
if(sizeof($usersession)>0){
    $user = $usersession[0];
    $_SESSION['user'] = $user['NAME'];
    $_SESSION['user_id'] = $user['ID'];
    header('location: /');
    exit();
}
$stmt = $con->prepare(" SELECT * FROM `PATIENTS`  WHERE (`EMAIL` = ? AND `PASSWORD` = ?)");
$stmt->execute([$email,$password]);
$usersession = $stmt ->fetchAll();
if(sizeof($usersession)>0){
    $user = $usersession[0];
    $_SESSION['user'] = $user['NAME'];
    $_SESSION['user_id'] = $user['ID'];
    header('location: /');
    exit();
}
header('location: ../view/loginForm.php?message=Usuário ou senha incorretos&validate=danger');

?>