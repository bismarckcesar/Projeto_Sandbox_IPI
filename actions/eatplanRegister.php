<?php
require 'init.php';
require ('../model/conect.php');

$start = $_POST['initDate'];
$finish = $_POST['finishDate'];
$objective = $_POST['objective'];
$patientId = $_POST['patient_id'];
$nutriId = $_SESSION['user_id']; // id do nutricionista

// var_dump($_POST);

$mealw = array_filter($_POST, function($meals){
        
    
        $a = strpbrk($meals,'W');
        return strlen($a)>0;
   
},ARRAY_FILTER_USE_KEY);
$meal = array_filter($_POST, function($meals){
        
    
    $a = strpbrk($meals,'N');
    return strlen($a)>0;

},ARRAY_FILTER_USE_KEY);




$stmt = $con->prepare('INSERT INTO EATING_PLANS(DATE_START,DATE_FINISH,OBJECTIVE,NUTRITIONIST_ID,PATIENT_ID) VALUES (?,?,?,?,?)');
$stmt->execute([$start,$finish,$objective,$nutriId,$patientId]);
$idplan = $con->lastInsertId();

for ($i=1; $i <=sizeof($mealw) ; $i++) { 
    $stmt = $con->prepare('INSERT INTO MEALS(NAME,WEIGHT,EATING_PLANS_ID) VALUES (?,?,?)');
    $stmt->execute([$meal['mealName-'.$i],$mealw['mealWeight-'.$i],$idplan]); 
}


header('location: ../view/home.php');

?>