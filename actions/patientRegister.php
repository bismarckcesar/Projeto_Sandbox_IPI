<?php
require_once('../model/conect.php');

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$date = $_POST['date'];
$weight = floatval(trim(str_replace(',', '.', $_POST['weight'])));
$height = floatval(trim(str_replace(',', '.', $_POST['height'])));
$objective = $_POST['objective'];
$password = trim(sha1($_POST['password']));
$confirmPW = trim(sha1($_POST['confirmPW']));

$stmt = $con->prepare("SELECT `EMAIL`, `CPF` FROM `NUTRITIONISTS` WHERE (`CPF`=? OR `EMAIL`=?)");
$stmt->execute([$cpf, $email]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $con->prepare("SELECT `EMAIL`, `CPF` FROM `PATIENTS` WHERE (`CPF`=? OR `EMAIL`=?)");
$stmt->execute([$cpf, $email]);
$result2 = $stmt->fetch(PDO::FETCH_ASSOC);

if ( $password != $confirmPW) {

  header("location: ../view/patientForm.php?error=As senhas não coincidem!&validate=danger");
  exit();
  
}else if($result2['EMAIL'] == $email || $result['EMAIL']){

    header('location: ../view/patientForm.php?error=E-mail ou CPF já cadastrado!&validate=danger');  
    exit();

}else if ($result2['CPF'] == $cpf || $result['CPF']) {
        
header('location: ../view/patientForm.php?error=E-mail ou CPF já cadastrado!&validate=danger');
exit();

}
	
$stmt = $con->prepare('INSERT INTO PATIENTS(CPF, NAME, DATE_BIRTH, WEIGHT, HEIGHT, OBJECTIVE, PASSWORD, EMAIL) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$cpf, $name, $date, $weight, $height, $objective, $password, $email]);

header('location: ../view/patientForm.php?error=Paciente cadastrado com sucesso!&validate=success');
exit();

 ?>