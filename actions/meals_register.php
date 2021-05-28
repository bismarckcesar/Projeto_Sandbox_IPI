<?php
require 'init.php';
require ('../model/conect.php');

$idplan = $_POST['plan_id'];

$mealw = array_filter($_POST, function($meals){          
        $a = strpbrk($meals,'W');
        return strlen($a)>0;  
},ARRAY_FILTER_USE_KEY);

$meal = array_filter($_POST, function($meals){         
    $a = strpbrk($meals,'N');
    return strlen($a)>0;
},ARRAY_FILTER_USE_KEY);

for ($i = 1; $i <= sizeof($mealw); $i++) { 
    $stmt = $con->prepare('INSERT INTO MEALS(NAME,WEIGHT,EATING_PLANS_ID) VALUES (?,?,?)');
    $stmt->execute([$meal['mealName-'.$i],floatval(trim(str_replace(',', '.', $mealw['mealWeight-'.$i]))),$idplan]); 
}

header('location: ../view/home.php?message=Plano alimentar cadastrado com suscesso!&validate=success');
?>