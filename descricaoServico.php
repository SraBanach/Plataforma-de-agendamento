<?php
//tag para inserir o codigo php


//Parametros
////as vezes precisa de parametro para funcionar a extensao php debug mostra o que falta se passar mouse em cima; 
//Parametros de conexao, pego esses valores da documentacao;
//127.0.0.1 = local 
////as vezes precisa de parametro para funcionar a extensao php debug mostra o que falta se passar mouse em cima; 
$dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
$user = 'root';
$password = '';

//no php tem uma biblioteca no padrao de uma classe; semore que tiver a palavra new é pq estou fazendo uma conexao; 
//quando tivet type null não é obrigatorio ; 
//variavel banco recebe conexao com o banco ( as informacoes estao la; )
$banco = new PDO($dsn, $user, $password);

//variavel sempre tem $ 
//variavel select, o que eu quero que liste  
$select = 'SELECT * FROM tb_cad_servicos';

//comando para executar, para rodar; 
//varivel resultado com a junção de banco com select; 
//fetchAll para buscar todas as informaçoes; 
$resultado = $banco->query($select)->fetchAll();
$categoriaEscolhido = "";
//para organizar o arquivo abaixo, sempre colocar antes do var_dump;
//somente para eu ver, nao no projeto; 
//echo '<pre>';

//comando echo apenas exibe o resultado de tudo; 
//var_dump ele faz um debug da variavel, lembrar de colocar (), mostra tipo de elemento; mas aparece tudo sem organizar, tudo confuso; 

// fechando a tag php 
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - Beauty Salon</title>
    <link rel="stylesheet" href="./assets/css/telaDescricao.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="col col-6">
            <div class="header">
                <div class="logo">
                    <img src="./assets/img/logo salao.jpg" alt="Beauty Logo"> 
                </div>
                <div class="info">
                    <ul>
                        <li> Endereço </li>
                        <li> Sobre </li>
                        <li> Categoria </li>
                    </ul>
                    <!-- <h2>Endereço</h2>
                    <p>Sobre | Horário de funcionamento</p>
                    <p>Descrição do serviço | Categoria</p> -->
                </div>
                <!-- <div class="banner">
                    <img src="./assets/img/beauty-salon.jpg" alt="foto salao">
                </div> -->
            </div>
        </div>
        <div class="col col-6">
            <div class="servicos">
                <ul><?php foreach ($resultado as $linha) { ?>
                    <li><?= $linha ['servico'] ?> <span>R$ <?= $linha['valor'] ?></span></li>
                    <?php } ?>
                </ul>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agendamentoModal">Agendar Serviço</a>
            </div>
        </div>
        <br>

        <div class="reviews">
            <h2>Avaliações</h2>
        </div>
    </div>

    <!-- deixa o botao de next como hidden para ficar oculto
    colocar um javascrip onclick para quando eu clicar no botao ele dar next  -->
    <!-- Modal escolha de Categoria -->
<div class="modal fade" id="agendamentoModal" tabindex="-1" aria-labelledby="escolhaCategoria" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="escolhaCategoria"> Escolha a categoria </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <?php foreach ($resultado as $linha) { ?>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#escolhaServico" 
                            data-categoria="<?= $linha['categoria'] ?>" data-servico="<?= $linha['servico'] ?>" 
                            data-profissional="<?= $linha['nome_profissional'] ?>" data-valor="<?= $linha['valor'] ?>">
                            <?= $linha['categoria'] ?>
                            <?= $categoriaEscolhido = $linha['categoria'] ?>

                        </a>

                    <br>
                    <br>
                    var_dump($categoriaEscolhido);
                <?php } ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <!-- <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#escolhaServico">proximo</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal escolha servico -->
<div class="modal fade" id="escolhaServico" tabindex="-1" aria-labelledby="escolhaServico" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="escolhaServico"> Escolha o serviço </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php foreach ($resultado as $linha) { ?>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#escolhaProfissional" 
                            data-categoria="<?= $linha['categoria'] ?>" data-servico="<?= $linha['servico'] ?>" 
                            data-profissional="<?= $linha['nome_profissional'] ?>" data-valor="<?= $linha['valor'] ?>">
                            <?= $linha['servico'] ?>
                        </a>
                    <p>Valor: R$ <?= $linha['valor'] ?></p>
                    var_dump($categoriaEscolhido);
                <?php } ?>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#escolhaProfissional">></button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal escolha de Profissional -->
<div class="modal fade" id="escolhaProfissional" tabindex="-1" aria-labelledby="escolhaProfissional" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EscolhaProfissional"> Escolha o profissional </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach ($resultado as $linha) { ?>
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#escolhaHorario" 
                            data-categoria="<?= $linha['categoria'] ?>" data-servico="<?= $linha['servico'] ?>" 
                            data-profissional="<?= $linha['nome_profissional'] ?>" data-valor="<?= $linha['valor'] ?>">
                            <?= $linha['nome_profissional'] ?>
                        </a>

                    </a>
                    <br>
                    <br>
                <?php } ?>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#escolhaHorario">></button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Escolha Horario -->
<div class="modal fade" id="escolhaHorario" tabindex="-1" aria-labelledby="escolhaHorario" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EscolhaHorario"> Horário </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php foreach ($resultado as $linha) { ?>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#resumo" 
                            data-categoria="<?= $linha['categoria'] ?>" data-servico="<?= $linha['servico'] ?>" 
                            data-profissional="<?= $linha['nome_profissional'] ?>" data-valor="<?= $linha['valor'] ?>">
                            <?= $linha['Horario'] ?>
                        </a>
                        
                    <p>Valor: R$ <?= $linha['valor'] ?></p>
                <?php } ?>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#resumo">></button> -->
            </div>
        </div>
    </div>
</div>
<!-- Modal de resumo -->
<div class="modal fade" id="resumo" tabindex="-1" aria-labelledby="resumo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="resumo">Resumo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Resumo 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmacaoModalLabel">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmacaoModalLabel" tabindex="-1" aria-labelledby="confirmacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="confirmacaoModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Seu agendamento foi realizado com sucesso!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

