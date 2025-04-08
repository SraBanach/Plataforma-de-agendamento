<?php 
require './classes/Saloes.php';


include'./includes/header.php';
$titulo = 'AgendeBeauty-Inicio';
include './includes/sobre.php';



$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

$saloes = new Saloes();

if (!empty($categoria)) {
    $dadosSaloes = $saloes->filtrarPorCategoria($categoria);
} else {
    $dadosSaloes = $saloes->exibirListaSaloes(4);
}

include './includes/saloes_lista.php';



include './includes/footer.php';

?>
