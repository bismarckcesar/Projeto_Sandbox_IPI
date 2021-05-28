<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="shortcut icon" href="../public/img/fav-icon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sandbox - pesquisa</title>

    <?php include 'header.php'; ?>

</head>

<?php 

    require('../model/conect.php');

    if(!isset($_SESSION['user']) || $_SESSION['role'] == 2){
        header('location: ../index.php');
    }
    
    $search= $_GET['patient'];

    $stmt= $con->prepare('SELECT * FROM PATIENTS WHERE CPF LIKE :search OR NAME LIKE :search');
    $stmt->execute(['search' => "$search%"]);

?>

<body>
    <main class="vh-min">
        <div class="container" style="margin-top: 100px">
        <h2 class="mb-5"> Pacientes encontrados </h2>

            <?php while($patient = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

                <table class="table table-light table-striped table-hover w-50 p-3 m-auto mb-4 border">
                    <tbody>
                        <h5>
                            <p class="text-center"><a class="link-patient text-decoration-none fw-bold" href="eatPlanForm.php?patient=<?php echo $patient['ID']?>">Criar plano alimentar</a></p>
                        </h5>
                        <tr scope="row">
                            <th class="w-50">Nome do paciente:</th>
                            <td class="text-start"><?php echo $patient['NAME'] ?></td>
                        </tr>
                        <tr scope="row"><td class="w-50">CPF:</td><td class="text-start"><?php echo $patient['CPF'] ?></td></tr>
                        <tr scope="row"><td class="w-50">Peso:</td><td class="text-start"><?php echo $patient['WEIGHT'] ?> kg</td></tr>
                        <tr scope="row"><td class="w-50">Altura:</td><td class="text-start"><?php echo $patient['HEIGHT'] ?></td></tr>
                        <tr scope="row"><td class="w-50">Objetivo:</td><td class="text-start"><?php echo $patient['OBJECTIVE'] ?></td></tr>
                    </tbody>
                </table>

            <?php endwhile?>

        </div>
    </main>

    <?php include 'footer.php'; ?>

</body>
</html>