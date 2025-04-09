<?php
require './classes/Saloes.php';
include './includes/header.php';

$titulo = 'Resultados da busca - AgendeBeauty';

// Pegando dados da URL
$categoria = isset($_GET['categoria']) ? trim($_GET['categoria']) : '';
$busca = isset($_GET['q']) ? trim($_GET['q']) : '';

// Criando instância da classe
$saloes = new Saloes();

// Lógica de busca e filtragem
if (!empty($categoria)) {
    $dadosSaloes = $saloes->filtrarPorCategoria($categoria);
    echo "<h2 style='padding: 1rem;'>Filtrando por categoria: <strong>$categoria</strong></h2>";
} elseif (!empty($busca)) {
    $dadosSaloes = $saloes->buscarPorPalavraChave($busca);
    echo "<h2 style='padding: 1rem;'>Resultado da busca por: <strong>$busca</strong></h2>";
} else {
    $dadosSaloes = $saloes->exibirListaSaloes(12);
}

// Verifica se encontrou algum salão
if (empty($dadosSaloes)) {
    echo "<p style='padding: 1rem; color: red;'>Nenhum salão encontrado.</p>";
} else {
    // Inclui a lista de salões formatada
    include './includes/saloes_lista.php';
}
?>
