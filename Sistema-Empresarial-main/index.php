<?php
    session_start();
    include './conn/connection.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = $_POST['password'];

        $sql = "SELECT id FROM superior WHERE username = '$username' AND password = '$password'";
        $result = $connection->query($sql);

        if ($result->num_rows == 1) {
            session_regenerate_id();
            $_SESSION['username'] = $username;
            header('Location: ./screens/welcome.php');
        } else {
            $error = "<h2 class='error'>Seu nome de usuário ou senha está inválido</h2>";
            echo $error;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="./assets/icon/briefcase-solid.svg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Sistema de Banco de Horas</title>

    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/reset.css">
</head>
<body>

    <div class="screen">
        
        <div class="forms">
            <h1>Bem-vindo de volta,</h1>
            <form action="" method="POST">
                <label for="username">Login</label>
                <br>
                <input type="text" id="username" name="username" placeholder="Insira seu login corporativo">
                <br>
                <label for="password">Senha</label>
                <br>
                <input type="password" id="password" name="password" placeholder="Insira sua senha">
                <br>
                <input type="submit" name="submit" value="Login">
            </form>
        </div>

    </div>
    
</body>
</html>