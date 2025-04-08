<?php
session_start(); // <-- INICIA A 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        // funcao para verificar se existe e se esta vazio; 
        // ! empty = diferente de vazio;
        // como se lê? existe uma variavel chamada titulo? && essa variavel titulo esta vazia? 
        // caso não existe ou estiver vazia, escreva Cinebox;

        if (isset($titulo) && !empty($titulo)){
            echo $titulo;
        } else { 
            echo 'AgendeBeauty';
        }
        
        ?>

    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="./assets/css/telaServico.css">


</head>
<!-- comentario aqui tem algo a mais -->
<body>
    <header>
        <nav id="topo">
            <a href="index.php" class="logo">
                <h1>Agende Beauty</h1>
            </a>
            <ul class="search">
                <li> <i class="bi bi-search"></i></li>
            </ul>
            <?php if (isset($_SESSION['usuario_nome'])): ?>
    <a href="telaUsuario.php" class="boas-vindas">Olá, <?= $_SESSION['usuario_nome'] ?> 👋</a>
<?php else: ?>
    <a href="telaLogin.php" class="login">Login</a>
<?php endif; ?>

        </nav>
    </header>