<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="shortcut icon" href="../public/img/fav-icon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>
    <link href="../public/css/personalized.css" rel="stylesheet"/>

        <title>Registro do nutricionista</title>
</head>
<?php 

    require_once('../actions/init.php');
    require('../model/conect.php');

    if(!isset($_SESSION['user'])){
        header('location: ../actions/logout.php');
    }

    $stmt= $con->prepare('SELECT * FROM PATIENTS WHERE id=?');
    $stmt->execute([$_GET['patient']]);
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<body>
<?php include 'header.php'; ?>
    <div id="form-eat-plan" class="container bg-white w-50 ml-auto mr-auto mb-100" style="margin-top: 100px">
        <form action="../actions/eatplanRegister.php" id="eat-plan" class="w- border border-light p-5" method="POST">
            <p class="text-center h4 mb-4">Registro do Plano Alimentar</p>
            <fieldset>
            <legend class="h6 mt-3 mb-4">Dados do plano</legend>
                <!-- O check-box tem como valor o id do paciente que é enviado pelo método Post-->
                <input type="checkbox" class="d-none" name="patient_id" checked value="<?php echo $patient['ID'] ?>">
                <a class="user-select-none link-custom d-block mb-4 h5 text-decoration-none"><?php echo $patient['NAME'] ?></a>

                <label for="initDate">Data de início:</label><input type="date" id="start" class="form-control mb-4 border-custom" name="initDate" placeholder="Data de Início" required>
                <label for="finishDate">Data de Fim:</label><input type="date" id="finish" class="form-control mb-4 border-custom" name="finishDate" placeholder="Data de Fim" required>
                <label for="objective">Objetivo:</label><input type="text" id="objective" class="form-control mb-4 border-custom" name="objective" placeholder="Objetivo">
            </fieldset>
            <fieldset id="meals">
                <legend class="h6 mt-4 mb-4">Refeições</legend>
                <label for="meal-1" id="label-1-1">Refeição:</label><input name="mealName-1" id="meal-1" class="form-control mb-4 border-custom" placeholder="Refeição" required="true">
                <label for="weight-1" id="label-2-1">Peso:</label><input name="mealWeight-1" id="weight-1" class="form-control mb-4 border-custom" placeholder="Peso em gramas" required="true">
                <button class="btn btn-primary d-inline-block col-1 " type="button" id="addmeal" onClick="addMeal()">+</button>
                <button class="btn btn-primary d-inline-block col-1" type="button" id="removemeal" onClick="removeMeal()">-</button>
            </fieldset>

            <button class="btn btn-primary mt-5">Criar Plano</button>
        </form>   
        </div>
    <?php include 'footer.php'; ?>
</body>
</html>
