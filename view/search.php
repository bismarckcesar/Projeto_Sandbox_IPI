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
    
    $search= $_POST['search'];

    $stmt= $con->prepare('SELECT * FROM PATIENTS WHERE CPF LIKE :search OR NAME LIKE :search');
    $stmt->execute(['search' => "$search%"]);

?>
	<?php include 'header.php'; ?>
    <main class="vh-max">
        <div class="container" style="margin-top: 100px">
        <h2 class="mb-5"> Pacientes encontrados </h2>
            <?php while($patient = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <table class="table table-light table-striped table-hover w-50 p-3 m-auto mb-4 border">
                    <thead>
                        <tr class="border-bottom border-black">
                            <th scope="col"><?php echo $patient['NAME']?></th>
                            <th class="text-end"><a class="link-patient" href="eatPlanForm.php?patient=<?php echo $patient['ID']?>">Criar plano alimentar</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row"><td class="w-50">CPF</td><td class="text-start"><?php echo $patient['CPF'] ?></td></tr>
                        <tr scope="row"><td class="w-50">Peso</td><td class="text-start"><?php echo $patient['WEIGHT'] ?></td></tr>
                        <tr scope="row"><td class="w-50">Altura</td><td class="text-start"><?php echo $patient['HEIGHT'] ?></td></tr>
                        <tr scope="row"><td class="w-50">Objetivo</td><td class="text-start"><?php echo $patient['OBJECTIVE'] ?></td></tr>
                    </tbody>
                </table>
            <?php endwhile?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>