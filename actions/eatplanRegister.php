<?php 

require 'init.php';

$start= $_POST['start'];
$finish= $_POST['finish'];
$objective= $_POST['objective'];
$nutriId= $_SESSION['user_id']; // id do nutricionista





require '../model/conect.php';


$stmt= $con->prepare('INSERT INTO EATING_PLANS(DATE_START,DATE_FINISH,OBJECTIVE,NUTRITIONIST_ID) VALUES (?,?,?,?)');
$stmt->execute([$start,$finish,$objective,$nutriId]);


header('location: ../view/home.php');




 ?>