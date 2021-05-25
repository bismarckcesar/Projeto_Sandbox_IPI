<?php 
require_once('../model/conect.php');
require_once('init.php');

if(!isset($_SESSION['user'])){
    header('location: ../view/login.php');
 exit();
}   
$id = $_GET['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$user = $_SESSION['user_id'];


$stmt = $pdo->prepare("SELECT * FROM `EATING_PLANS` WHERE `NUTRITIONIST_ID` = ?");
$stmt->execute([$user]);
if ($stmt->rowCount() > 0 && $stmt->fetch()['NUTRITIONIST_ID'] == $user) {
    $stmt = $pdo->prepare("UPDATE `MEALS` SET `NAME` = ?, `DESCRIPTION` = ? WHERE `ID` = ?");
    $stmt->execute([$name,$description,$id]);
}

header('location:/');
?>