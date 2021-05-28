<?php
require_once('../model/conect.php');
require_once('init.php');

if(!isset($_SESSION['user'])){
 header('location: ../view/login.php');
 exit();
} 

$id = $_GET['id'];
$user = $_SESSION['user_id'];
// var_dump($_GET);
// exit();
$stmt = $con->prepare("SELECT * FROM `EATING_PLANS` WHERE `NUTRITIONIST_ID` = ?");
$stmt->execute([$user]);
if ($stmt->rowCount() > 0 && $stmt->fetch()['NUTRITIONIST_ID'] == $user) {
    while($stmt->rowCount() > 0){ 
        $stmt = $con->prepare(" DELETE FROM `MEALS` WHERE `EATING_PLANS_ID` = ?");
        $stmt->execute([$id]);
    }
    $stmt = $con->prepare(" DELETE FROM `EATING_PLANS` WHERE `ID` = ?");
    $stmt->execute([$id]);
    
}

header("location: ../view/home.php?message=Plano alimentar Deletado!&validate=success");
?>



