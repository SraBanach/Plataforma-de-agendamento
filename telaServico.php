<?php 

require './classes/Saloes.php';




include'./includes/header.php';

$titulo = 'AgendeBeaty-telaServico';

?>




<nav>

<ul class="menu">
<li><a href="?categoria=Sobrancelhas">Sobrancelhas</a></li>
        <li><a href="?categoria=Unhas">Unhas</a></li>
        <li><a href="?categoria=Cílios">Cílios</a></li>
        <li><a href="?categoria=Maquiagem">Maquiagem</a></li>
</ul>
</nav>

<?php

//se id existe e esta diferente de sazio ou seja se ele esta preenchido ele redireciona para saloes lista, se nao volta para o index; 
//if (isset($_GET['id']) && !empty($_GET['id'])) {
//} else {
  //  header('location:index.php');
//}
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

$saloes = new Saloes();

if (!empty($categoria)) {
    $dadosSaloes = $saloes->filtrarPorCategoria($categoria);
} else {
    $dadosSaloes = $saloes->exibirListaSaloes(8);
}







    $saloes = new Saloes();

    $dadosSaloes = $saloes->exibirListaSaloes(8);

    include'./includes/saloes_lista.php';
    ?>

    