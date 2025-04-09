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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="./assets/css/telaServico.css">


</head>
<!-- comentario aqui tem algo a mais -->
<body>
<header>
    <nav id="topo" class="d-flex align-items-center justify-content-between px-3 py-2">
        <a href="index.php" class="logo">
        <img src="/SraBanach/Plataforma-de-agendamento/assets/img/agendeBeauty.png" alt="Agende Beauty" style="height: 150px; width: 150px; border-radius: 50%; object-fit: cover;">
        </a>


        <div class="d-flex align-items-center gap-3 ms-auto">
            <!-- Barra de busca -->
            <form action="buscar.php" method="GET" role="search" class="d-flex" style="max-width: 300px;">
                <div class="input-group rounded-pill">
                    <input type="search" name="q" class="form-control rounded-start-pill" placeholder="Buscar salões ou serviços" aria-label="Buscar">
                    <button class="btn btn-outline-success rounded-end-pill" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

            <!-- Login ou boas-vindas -->
            <?php if (isset($_SESSION['usuario_nome'])): ?>
                <a href="telaUsuario.php" class="btn btn-outline-primary rounded-pill">
                    Olá, <?= $_SESSION['usuario_nome'] ?> 👋
                </a>
                <a class="botaoLogout" href="logout.php">Sair</a>
            <?php else: ?>
                <a href="telaLogin.php" class="btn btn-outline-primary rounded-pill">
                    Login
                </a>
            <?php endif; ?>
        </div>
    </nav>
</header>
