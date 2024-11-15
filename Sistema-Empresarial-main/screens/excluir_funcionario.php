<?php
session_start();
include '../conn/connection.php'; // Inclui a conexão

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = ''; // Variável para armazenar a mensagem

// Verifica se o ID do funcionário foi passado na URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a consulta para deletar o funcionário
    $delete = $connection->prepare("DELETE FROM funcionarios WHERE id = ?");

    if ($delete === false) {
        $message = "Erro ao preparar consulta: " . $connection->error;
    } else {
        // Deleta o funcionário baseado no ID
        $delete->bind_param("i", $id); // "i" para inteiro (ID)

        // Executa o comando
        if ($delete->execute()) {
            $message = "Funcionário excluído com sucesso!";
        } else {
            $message = "Erro ao excluir: " . $delete->error;
        }
    }
} else {
    $message = "ID inválido!";
}

// Exibe a mensagem na mesma página
echo "<script>alert('$message');</script>";
echo "<script>window.location.href = 'visualize.php';</script>";
?>
