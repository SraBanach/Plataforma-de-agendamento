<?php
require './classes/Saloes.php';
include './includes/header.php';

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
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

$saloes = new Saloes();

if (!empty($categoria)) {
    $dadosSaloes = $saloes->filtrarPorCategoria($categoria);
} else {
    $dadosSaloes = $saloes->exibirListaSaloes(12);
}

include './includes/saloes_lista.php';
?>
