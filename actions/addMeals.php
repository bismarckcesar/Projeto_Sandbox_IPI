<?php
require_once('../model/conect.php');
require_once('init.php');

if(!isset($_SESSION['user'])){
 header('location: ../view/login.php');
 exit();
}
$id = $_GET['id'];

$mealw = array_filter($_POST, function($meals){          
    $a = strpbrk($meals,'W');
    return strlen($a)>0;  
},ARRAY_FILTER_USE_KEY);

$meal = array_filter($_POST, function($meals){         
$a = strpbrk($meals,'N');
return strlen($a)>0;
},ARRAY_FILTER_USE_KEY);

if(isset($mealw) && isset($meal)){
    for ($i = 1; $i <= sizeof($mealw); $i++) { 
        $stmt = $con->prepare('INSERT INTO MEALS(NAME,WEIGHT,EATING_PLANS_ID) VALUES (?,?,?)');
        $stmt->execute([$meal['mealName-'.$i],floatval(trim(str_replace(',', '.', $mealw['mealWeight-'.$i]))),$id]); 
    }
}
header('location: ../view/home.php?message=Refeição adicionada com sucesso!&validate=success')

?>