<?php
include('conexao.php');

if (isset($_POST['idRM']) || isset($_POST['senha'])) {
    if (strlen($_POST['idRM']) == 0) {
        echo "Preencha seu RM";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha seu nome de aluno";
    } else {
        $idRM = $_POST['idRM'];
        $senha = $_POST['senha'];
        //Usar: ' OR '1'='1   para ambos os campos de texto
        //Proteção contra SQL Injection:
        /*$idRM = $mysqli->real_escape_string($_POST['idRM']);
        $senha = $mysqli->real_escape_string($_POST['senha']);*/

        $sql_code = "SELECT * FROM usuarios WHERE rm = '$idRM' AND nome = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['rm'] = $usuario['rm'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
        } else {
            echo "<p class=\"text-danger\">Falha ao logar! RM ou nome incorretos</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Tela de Login</title>
</head>

<body class="m-4 bg-secondary">
    <div id="mainBox" class="position-absolute top-50 start-50 translate-middle p-5 bg-dark text-white rounded">
        <h1>Login</h1> <br>
        <form action="" method="post">
            <p>
                <label>RM:</label> <br>
                <input class="fieldtxt" type="text" name="idRM" placeholder="RM">
            </p>
            <p>
                <label>Nome aluno:</label> <br>
                <input class="fieldtxt" type="password" name="senha" placeholder="Nome do aluno">
            </p>
            <p>
                <button type="submit" class="btn btn-primary" style="float: right;">Entrar</button>
            </p>
        </form>
    </div>

</body>

</html>