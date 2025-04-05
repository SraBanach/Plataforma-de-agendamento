<?php 

require './classes/Saloes.php';




include'./includes/header.php';

$titulo = 'AgendeBeaty-telaServico';

?>




<nav>

<ul class="menu">
    <li><a href= "#">Sobrancelhas</a> </li>
    <li><a href= "#">Unhas</a> </li>
    <li><a href= "#">Cilios</a> </li>
    <li><a href= "#">Maquiagem</a> </li>
</ul>
</nav>

<?php

//se id existe e esta diferente de sazio ou seja se ele esta preenchido ele redireciona para saloes lista, se nao volta para o index; 
//if (isset($_GET['id']) && !empty($_GET['id'])) {
//} else {
  //  header('location:index.php');
//}


    $saloes = new Saloes();

    $dadosSaloes = $saloes->exibirListaSaloes(8);

    include'./includes/saloes_lista.php';
    ?>

    