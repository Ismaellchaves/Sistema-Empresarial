<?php
// Incluir a conexão com o banco de dados
include '../conn/connection.php';  // Corrigido o caminho

// Verificar se a conexão foi bem-sucedida
if (!$connection) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Consulta SQL para calcular as horas totais trabalhadas por cada funcionário
$sql = "
    SELECT f.nome, 
           SUM(TIME_TO_SEC(r.horas_totais)) / 3600 AS total_horas  /* Converte segundos para horas */
    FROM funcionarios f
    JOIN registro_horas r ON f.id = r.id_funcionario
    GROUP BY f.id
    ORDER BY total_horas DESC
";

// Executar a consulta e verificar se foi bem-sucedida
$result = $connection->query($sql);

// Verificar se houve erro na consulta
if (!$result) {
    die("Erro na consulta SQL: " . $connection->error);
}

// Arrays para armazenar os dados do gráfico
$funcionarios = [];
$horasTrabalhadas = [];
$cores = [];

// Processar os resultados e preencher os arrays
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $funcionarios[] = $row['nome'];
        $horasTrabalhadas[] = round($row['total_horas'], 2); // Arredondando para 2 casas decimais

        // Definir a cor com base nas horas trabalhadas
        if ($row['total_horas'] >= 8) { // Mais de 8h
            $cores[] = 'green';
        } elseif ($row['total_horas'] >= 7) { // Entre 7h e 8h
            $cores[] = 'yellow';
        } else { // Menos de 7h
            $cores[] = 'red';
        }
    }
} else {
    echo "Nenhum dado encontrado.";
}

$connection->close(); // Fechar a conexão com o banco
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gráfico de Horas Trabalhadas</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Estilos para o botão de voltar */
    .back-btn {
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 10px 20px;
      background-color: #248C41; /* Verde escuro */
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s ease;
    }

    .back-btn:hover {
      background-color: #004d00; /* Tom mais escuro de verde */
    }

    .back-btn:focus {
      outline: none;
    }

    /* Estilo adicional para ajustar o tamanho do gráfico */
    canvas {
      max-width: 2000px; /* Tamanho máximo do gráfico */
      width: 100%; /* Largura responsiva */
      height: 250px; /* Altura ajustada do gráfico */
    }

    /* Estilo para as labels (nomes) mais escuros */
    .chartjs-render-monitor {
      font-weight: bold;
      color: #000; /* Cor mais escura */
    }
  </style>
</head>
<body>
  <button class="back-btn" onclick="window.location.href='welcome.php';">Voltar para a Página Inicial</button>
  <h1>Gráfico de Horas Trabalhadas</h1>
  <canvas id="horasTrabalhadasChart"></canvas>

  <script>
    // Dados PHP para o gráfico
    const funcionarios = <?php echo json_encode($funcionarios); ?>;
    const horasTrabalhadas = <?php echo json_encode($horasTrabalhadas); ?>;
    const cores = <?php echo json_encode($cores); ?>;

    const ctx = document.getElementById('horasTrabalhadasChart').getContext('2d');
    const horasTrabalhadasChart = new Chart(ctx, {
      type: 'bar', // Tipo de gráfico
      data: {
        labels: funcionarios, // Labels dos funcionários
        datasets: [{
          label: 'Horas Trabalhadas (horas)',
          data: horasTrabalhadas, // Dados das horas
          backgroundColor: cores, // Cor baseada nas horas trabalhadas
          borderColor: 'black',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          x: {
            ticks: {
              font: {
                weight: 'bold', // Deixar o nome mais visível
                size: 14, // Ajuste no tamanho da fonte
              }
            }
          },
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return value + 'h'; // Exibindo em horas
              }
            }
          }
        }
      }
    });
  </script>
</body>
</html>
