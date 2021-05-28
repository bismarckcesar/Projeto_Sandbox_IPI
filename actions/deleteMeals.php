<?php 
require_once('../model/conect.php');
require_once('init.php');

if(!isset($_SESSION['user'])){
    header('location: ../view/login.php');
    exit();
   }

$id = $_GET['id'];
$user = $_SESSION['user_id'];
$stmt = $con->prepare("SELECT * FROM `EATING_PLANS` WHERE `NUTRITIONIST_ID` = ?");
$stmt->execute([$user]);
if ($stmt->rowCount() > 0 && $stmt->fetch()['NUTRITIONIST_ID'] == $user) {
    // echo 'passo';
    // exit();
    $stmt = $con->prepare(" DELETE FROM `MEALS` WHERE `ID` = ?");
    $stmt->execute([$id]);
}

header('location: ../view/home.php?message=Refeição Deletada!&validate=success');
?>