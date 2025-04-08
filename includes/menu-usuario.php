<?php
$paginaAtual = basename($_SERVER['PHP_SELF']);
?>

<?php if (isset($_SESSION['usuario_id'])): ?>
    <div class="menu-usuario">
        <?php if ($paginaAtual !== 'usuario-editar.php'): ?>
            <a class="botaoAgendamentos" href="meusAgendamentos.php">Meus Agendamentos</a>
        <?php endif; ?>
        <a class="botaoEditar" href="usuario-editar.php">Editar Informações</a>
        <a class="botaoDeletar" href="deletar-usuario.php">Deletar Conta</a>
        <a class="botaoLogout" href="logout.php">Sair</a>
    </div>
<?php endif; ?>
