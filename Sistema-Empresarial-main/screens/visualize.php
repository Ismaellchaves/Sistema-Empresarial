<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: connection.php');
    exit;
}

include '../conn/connection.php';

// Verifica se a conexão foi bem-sucedida
if (!$connection) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Realiza a consulta para retornar todos os registros com nome e função do funcionário
session_regenerate_id();

// Preparar a consulta
$consulta = $connection->prepare("
    SELECT f.id, f.nome, f.funcao, r.data_ponto, r.entrada_1, r.saida_1, r.entrada_2, r.saida_2, r.horas_totais 
    FROM registro_horas r
    JOIN funcionarios f ON r.id_funcionario = f.id
    ORDER BY f.id ASC, r.data_ponto DESC
");



// Verifica se a consulta foi preparada corretamente
if (!$consulta) {
    die("Erro ao preparar a consulta: " . $connection->error);
}

// Executa a consulta
if (!$consulta->execute()) {
    die("Erro ao executar a consulta: " . $consulta->error);
}

// Obtém o resultado da consulta
$result = $consulta->get_result();
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
    <title>Visualizar Funcionários</title>
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/visualize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php include './header.php' ?>

    <main>
        <div class="table-div">
            <table class="table-all mb-5">
                <thead>
                    <tr class="title-table text-center">
                        <td>ID do Funcionário</td>
                        <td>Nome</td>
                        <td>Função</td>
                        <td>Data do Ponto</td>
                        <td>Primeira Entrada</td>
                        <td>Primeira Saída</td>
                        <td>Segunda Entrada</td>
                        <td>Segunda Saída</td>
                        <td>Horas Trabalhadas</td>
                        <td>Ações</td> <!-- Nova coluna para os botões -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($result)) : ?>
                        <?php while ($dice = $result->fetch_array(MYSQLI_ASSOC)) : ?>
                            <tr class="info-table">
                                <td><?= htmlspecialchars($dice['id']); ?></td>
                                <td><?= htmlspecialchars($dice['nome']); ?></td>
                                <td><?= htmlspecialchars($dice['funcao']); ?></td>
                                <td class="error-text"><?= date("d/m/Y", strtotime($dice['data_ponto'])); ?></td>
                                <td><?= htmlspecialchars($dice['entrada_1']); ?></td>
                                <td><?= htmlspecialchars($dice['saida_1']); ?></td>
                                <td><?= htmlspecialchars($dice['entrada_2']); ?></td>
                                <td><?= htmlspecialchars($dice['saida_2']); ?></td>
                                <td><?= htmlspecialchars($dice['horas_totais']); ?></td>
                                <td>
                                    <!-- Botões de Editar e Excluir -->
                                    <a href="editar_funcionario.php?id=<?= $dice['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="excluir_funcionario.php?id=<?= $dice['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este funcionário?');">Excluir</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
