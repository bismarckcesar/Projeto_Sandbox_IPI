<?php 
$search= $_POST['search'];

require('../model/conect.php');

$stmt= $con->prepare('SELECT * FROM PATIENTS WHERE CPF LIKE :search OR NAME LIKE :search');
$stmt->execute(['search' => "$search%"]);

while ($patients = $stmt->fetch(PDO::FETCH_ASSOC)){
 echo "Nome do Paciente: ". $patients['NAME'] ."<br>";
} 

 ?>