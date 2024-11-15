<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit;
}

include '../conn/connection.php';

$error = ""; // Define a variável $error

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $func = filter_input(INPUT_POST, 'func', FILTER_SANITIZE_SPECIAL_CHARS);
    $nasc = $_POST['nasc'];
    $function = filter_input(INPUT_POST, 'function', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($func) && !empty($nasc) && !empty($function)) {
        session_regenerate_id();

        try {
            $sql = $connection->prepare("INSERT INTO funcionarios(nome, data_nascimento, funcao) VALUES(?, ?, ?)");
            $sql->bind_param("sss", $func, $nasc, $function);
            $sql->execute();

            $sql->close();
            $connection->close();
            header('Location: welcome.php');
            exit;
        } catch(Exception $e) {
            $error = "Erro ao inserir no banco de dados: " . $e->getMessage();
        }
    } else {
        $error = "Parâmetros vazios! Insira corretamente cada parte.";
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
    
    <title>Cadastro de Funcionários</title>

    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/welcome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php' ?>

    <main>
        <div class="main-cadastro">
            <div>
                <h1 class="pt-5">Olá, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
                <hr class="hr-new">
            </div>

            <form class="forms-cadastro" action="" method="POST">
                <div class="forms-div">
                    <div>
                        <h3 class="text-cadastro">Cadastro de Novos Funcionários</h3>
                    </div>

                    <div class="values">
                        <div>
                            <label for="func">Insira o nome do Novo Funcionário</label>
                            <input type="text" name="func" id="func" class="input-cadastro" required>
                        </div>

                        <div>
                            <label for="nasc">Insira a data de nascimento</label>
                            <input type="date" name="nasc" id="nasc" class="input-cadastro" required>
                        </div>

                        <div>
                            <label for="function">Insira a função deste funcionário</label>
                            <input type="text" name="function" id="function" class="input-cadastro" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Aceite os termos e condições.
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>

                    <div>
                        <input type="submit" name="submit" class="btn btn-success new-button" value="Cadastrar novo funcionário">
                    </div>

                    <div>
                        <p class="text-danger"><?= $error; ?></p>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
