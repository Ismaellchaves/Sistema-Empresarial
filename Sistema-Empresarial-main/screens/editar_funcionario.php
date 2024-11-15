<?php
session_start();
include '../conn/connection.php';

// Verifica se a conexão com o banco de dados foi bem-sucedida
if (!$connection) {
    die("Erro na conexão com o banco de dados. Tente novamente mais tarde.");
}

// Verifica se o ID do funcionário foi passado via URL
if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; // Cast para garantir que o ID seja um inteiro

    // Prepara a consulta para recuperar os dados do funcionário
    $consulta = $connection->prepare("SELECT * FROM funcionarios WHERE id = ?");
    if (!$consulta) {
        die("Erro ao preparar a consulta. Tente novamente mais tarde.");
    }

    $consulta->bind_param("i", $id);
    if ($consulta->execute()) {
        $resultado = $consulta->get_result();
        
        if ($resultado->num_rows > 0) {
            // Recupera os dados do funcionário
            $funcionario = $resultado->fetch_assoc();
        } else {
            echo "Funcionário não encontrado.";
            exit;
        }
    } else {
        echo "Erro ao consultar dados do funcionário. Tente novamente mais tarde.";
        exit;
    }
} else {
    echo "ID do funcionário não fornecido.";
    exit;
}

// Atualiza os dados do funcionário se o formulário for enviado
if (isset($_POST['submit'])) {
    // Sanitização dos dados para evitar SQL Injection
    $nome = htmlspecialchars(trim($_POST['nome']));
    $funcao = htmlspecialchars(trim($_POST['funcao']));
    $entrada_1 = htmlspecialchars(trim($_POST['entrada_1']));
    $saida_1 = htmlspecialchars(trim($_POST['saida_1']));
    $entrada_2 = htmlspecialchars(trim($_POST['entrada_2']));
    $saida_2 = htmlspecialchars(trim($_POST['saida_2']));
    $horas_totais = htmlspecialchars(trim($_POST['horas_totais']));

    // Primeiro, atualiza os dados da tabela funcionarios
    $updateFuncionario = $connection->prepare("UPDATE funcionarios SET nome = ?, funcao = ? WHERE id = ?");
    if (!$updateFuncionario) {
        die("Erro ao preparar a atualização do funcionário. Tente novamente mais tarde.");
    }
    $updateFuncionario->bind_param("ssi", $nome, $funcao, $id);
    if (!$updateFuncionario->execute()) {
        echo "Erro ao atualizar dados do funcionário. Tente novamente mais tarde.";
        exit;
    }

    // Atualiza os dados na tabela de registro_horas
    $updateHoras = $connection->prepare("UPDATE registro_horas SET entrada_1 = ?, saida_1 = ?, entrada_2 = ?, saida_2 = ?, horas_totais = ? WHERE id_funcionario = ?");
    if (!$updateHoras) {
        die("Erro ao preparar a atualização de horas. Tente novamente mais tarde.");
    }
    $updateHoras->bind_param("sssssi", $entrada_1, $saida_1, $entrada_2, $saida_2, $horas_totais, $id);
    if ($updateHoras->execute()) {
        header('Location: visualize.php'); // Redireciona para a lista de funcionários
        exit;
    } else {
        echo "Erro ao atualizar os dados de horas. Tente novamente mais tarde.";
    }
}
?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/icon/briefcase-solid.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/visualize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            padding-bottom: 80px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-table {
            width: 100%;
            max-width: 600px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .form-table td {
            padding: 8px;
            vertical-align: middle;
        }
        .form-table input {
            width: 100%;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <?php include './header.php'; ?>

    <main>
        <div class="container">
            <form method="POST" action="" class="form-table">
                <h2 class="text-center mb-4">Editar Funcionário</h2>
                <table>
                    <tr>
                        <td><label for="nome">Nome</label></td>
                        <td><input type="text" id="nome" name="nome" value="<?= isset($funcionario['nome']) ? htmlspecialchars($funcionario['nome']) : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="funcao">Função</label></td>
                        <td><input type="text" id="funcao" name="funcao" value="<?= isset($funcionario['funcao']) ? htmlspecialchars($funcionario['funcao']) : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="entrada_1">Entrada 1</label></td>
                        <td><input type="time" id="entrada_1" name="entrada_1" value="<?= isset($funcionario['entrada_1']) ? htmlspecialchars($funcionario['entrada_1']) : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="saida_1">Saída 1</label></td>
                        <td><input type="time" id="saida_1" name="saida_1" value="<?= isset($funcionario['saida_1']) ? htmlspecialchars($funcionario['saida_1']) : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="entrada_2">Entrada 2</label></td>
                        <td><input type="time" id="entrada_2" name="entrada_2" value="<?= isset($funcionario['entrada_2']) ? htmlspecialchars($funcionario['entrada_2']) : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="saida_2">Saída 2</label></td>
                        <td><input type="time" id="saida_2" name="saida_2" value="<?= isset($funcionario['saida_2']) ? htmlspecialchars($funcionario['saida_2']) : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="horas_totais">Horas Totais</label></td>
                        <td><input type="text" id="horas_totais" name="horas_totais" value="<?= isset($funcionario['horas_totais']) ? htmlspecialchars($funcionario['horas_totais']) : ''; ?>" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Salvar Alterações</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
