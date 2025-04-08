<?php      
require './classes/Saloes.php';


include'./includes/header.php';

// dados (pessoa recebe uma funcao) filmes recebe o exibir lista filmes que esta no index; 
$salao = new Saloes();
//pessoa sua tarefa é preparar todos os pedidos e colocar na janela
//ele ja esta esperando os dados generos que ja esta dentro de SALOES_filtro
$dadosSaloes = $salao->exibirlistaSaloes();