<?php
require_once('../model/conect.php');

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$date = $_POST['date'];
$weight = floatval(trim(str_replace(',', '.', $_POST['weight'])));
$height = floatval(trim(str_replace(',', '.', $_POST['height'])));
$objective = $_POST['objective'];
$password = sha1(trim($_POST['password']));
$confirmPW = sha1(trim($_POST['password']));

$stmt = $con->prepare("SELECT `EMAIL`, `CPF` FROM `NUTRITIONISTS` WHERE (`CPF`=? OR `EMAIL`=?)");
$stmt->execute([$cpf, $email]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $con->prepare("SELECT `EMAIL`, `CPF` FROM `PATIENTS` WHERE (`CPF`=? OR `EMAIL`=?)");
$stmt->execute([$cpf, $email]);
$result2 = $stmt->fetch(PDO::FETCH_ASSOC);

if ( $password != $confirmPW) {

  header("location: ../view/patientForm.php?message=As senhas não coincidem!&validate=danger");
  exit();
  
}else if($result2['EMAIL'] == $email || $result['EMAIL']){

    header('location: ../view/patientForm.php?message=E-mail ou CPF já cadastrado!&validate=danger');  
    exit();

}else if ($result2['CPF'] == $cpf || $result['CPF']) {
        
header('location: ../view/patientForm.php?message=E-mail ou CPF já cadastrado!&validate=danger');
exit();

}

$code = md5(time());

$stmt = $con->prepare('INSERT INTO PATIENTS(CPF, NAME, DATE_BIRTH, WEIGHT, HEIGHT, OBJECTIVE, PASSWORD, EMAIL, VALIDATION_CODE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$cpf, $name, $date, $weight, $height, $objective, $password, $email, $code]);

$stmt = $con->prepare(" SELECT * FROM `PATIENTS` WHERE (`EMAIL` = ?)");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$type = 'patient';

include 'send_email.php';

header('location: register_status.php');

?>