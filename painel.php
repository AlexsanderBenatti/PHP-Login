<?php
include('protect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Painel</title>
</head>

<body class="m-4 bg-secondary">
    <div id="mainBox" class="position-absolute top-50 start-50 translate-middle text-white bg-dark p-5">
        <h1 class="">Seja Bem-vindo, <?php echo $_SESSION['nome']; ?> 👋 </h1>
        <p class="fs-5">
            <a href="logout.php">Logout</a> <br>
            <a href="index.php" class="btn btn-primary" style="float: right;">Voltar<a>
        </p>
    </div>
</body>

</html>