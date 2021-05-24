<?php 


$search= $_POST['search'];


require '../model/conect.php';

$stmt= $con->prepare('SELECT * FROM PATIENTS WHERE CPF LIKE :search OR NAME LIKE :search OR DATE_OF_BIRTH LIKE :search OR WEIGHT LIKE :search  OR HEIGHT LIKE :search OR OBJECTIVE LIKE :search');
$stmt->execute(['search' => "%$search%"]);

while ($patients = $stmt->fetch()){
 echo "Nome do Paciente: ". $patients['NAME'] ."<br>";
} 


 ?>