<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbname = 'empresa';
$username = 'root';
$password = '';
$charset = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password, $options);
} catch (\PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Verificar se todos os dados foram recebidos via POST
if (isset($_POST['funcionario_id'], $_POST['data'], $_POST['entrada_um'], $_POST['saida_um'], $_POST['entrada_dois'], $_POST['saida_dois'])) {
    
    // Atribuição das variáveis
    $funcionario_id = $_POST['funcionario_id'];
    $data = $_POST['data'];
    $entrada_um = $_POST['entrada_um'];
    $saida_um = $_POST['saida_um'];
    $entrada_dois = $_POST['entrada_dois'];
    $saida_dois = $_POST['saida_dois'];

    // Calcular o total de horas
    $total = (strtotime($saida_um) - strtotime($entrada_um)) + (strtotime($saida_dois) - strtotime($entrada_dois));
    $hours = floor($total / 60 / 60);
    $minutes = round(($total - ($hours * 60 * 60)) / 60);
    $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
    $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
    $horas_totais = $hours . ':' . $minutes;

    try {
        // Inserir os dados no banco
        session_start();  // Certifique-se de que a sessão foi iniciada antes de usar session_regenerate_id()
        session_regenerate_id();

        $sql = "INSERT INTO registro_horas(id_funcionario, data_ponto, entrada_1, saida_1, entrada_2, saida_2, horas_totais) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$funcionario_id, $data, $entrada_um, $saida_um, $entrada_dois, $saida_dois, $horas_totais]);

        // Redirecionar para outra página após a inserção
        header('Location: ../insert_hours.php');
        exit; // Importante adicionar o exit após o header para garantir que o script pare de rodar
    } catch (PDOException $e) {
        // Se ocorrer um erro de inserção no banco, exibe o erro
        echo "Erro ao inserir no banco de dados: " . $e->getMessage();
    }
} else {
    // Se os campos não foram enviados corretamente, exiba um erro
    echo "Erro: Todos os campos são obrigatórios.";
}
?>
