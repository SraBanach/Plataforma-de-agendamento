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

//para organizar o arquivo abaixo, sempre colocar antes do var_dump;
//somente para eu ver, nao no projeto; 
//echo '<pre>';

//comando echo apenas exibe o resultado de tudo; 
//var_dump ele faz um debug da variavel, lembrar de colocar (), mostra tipo de elemento; mas aparece tudo sem organizar, tudo confuso; 
//var_dump($resultado);
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
                <ul>
                    <li>Serviço 1 <span>R$ 100</span></li>
                    <li>Serviço 2 <span>R$ 150</span></li>
                    <li>Serviço 3 <span>R$ 200</span></li>
                    <li>Serviço 4 <span>R$ 250</span></li>
                </ul>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agendamentoModal">Agendar Serviço</a>
            </div>
        </div>
        <br>

        <div class="reviews">
            <h2>Avaliações</h2>
        </div>
    </div>

    <!-- aqui comeca o modal -->
    <div class="modal fade" id="agendamentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Escolha o serviço</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- conteudo do modal -->
        <!-- //foreach = para laço(de procura) de repetição automatico em array; 
        as - para atribuir; só usa a seta dentro do foreach -->
        <?php foreach ($resultado as $linha) { ?>
            <tr>
            <a class="btn btn-primary" href="./ficha.php?id_servico=<?= $linha['id_servico'] ?>" role="button">
                <?= $linha['categoria'] ?> 

                <td> <?= $linha['categoria'] ?> </td>
                <td> <?= $linha['valor'] ?> </td> <br>
                <td class="text-center"> 
                <!-- como colocar um link diferente para cada aluno depois da interrogacao passamos os parametros. -->
                <!-- metodo get colocar url do arquivo depois coloco a interrogacao para separar... 
                lado esquerdo  arquivo, lado direiro variavel -->
        <?php } ?>
        <!-- fim do foreach -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

