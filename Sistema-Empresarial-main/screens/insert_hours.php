<?php

    session_start();

    include '../conn/connection.php';

    if (!isset($_SESSION['username'])) {
        header('Location: ../index.php');
        exit;
    }

    $consulta = "SELECT id, nome FROM funcionarios";
    $conn = $connection->query($consulta) or die($connection->error);

?>

<!doctype html>

<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="../assets/icon/briefcase-solid.svg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <title>Banco de Horas</title>

    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/welcome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php include './header.php' ?>
        
    <main class="m-4">

        <div class="main-cadastro">

            <form action="./function/registro_horas.php" method="POST">

                <div class="forms-div">

                    <div>
                        <h2 class="text-cadastro">Registrando Banco de Horas</h2>
                    </div>

                    <div class="select-option py-2">

                        <label for="funcionario_id" class="select-func">Seleção de ID</label>

                        <select name="funcionario_id" id="funcionario_id" class="input-select-hours" required>
                            <option>Escolha um Funcionário</option>

                            <?php while($opt = $conn->fetch_array()) { ?>

                            <option value="<?=  $opt['id'] ?>"><?= $opt['id'] . " - " . $opt['nome']; ?></option>
                            
                            <?php } ?>
                        </select>

                    </div>

                    <label for="data">Data:</label>
                    <input type="date" id="data" name="data" class="input-cadastro" required>
                    <br>

                    <label for="entrada_um">Entrada 1:</label>
                    <input type="time" id="entrada_um" name="entrada_um" class="input-cadastro" required>
                    <br>

                    <label for="saida_um">Saída 1:</label>
                    <input
                    type="time" id="saida_um" name="saida_um" class="input-cadastro" required>
                    <br>

                    <label for="entrada_dois">Entrada 2:</label>
                    <input type="time" id="entrada_dois" name="entrada_dois" class="input-cadastro" required>
                    <br>

                    <label for="saida_dois">Saída 2:</label>
                    <input type="time" id="saida_dois" name="saida_dois" class="input-cadastro" required>
                    <br>

                    <input type="submit" name="submit" class="btn btn-success new-button" value="Registrar Horas">

                </div>

            </form>

        </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</body>
</html>