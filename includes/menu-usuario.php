<?php
$paginaAtual = basename($_SERVER['PHP_SELF']);
?>

<?php if (isset($_SESSION['usuario_id'])): ?>
    <div class="menu-usuario">
        <!-- Botão de Voltar (sempre aparece) -->
        <a class="botaoVoltar" href="telaServico.php">← Voltar</a>
        <br>
        <br>

        <!-- Só exibe "Meus Agendamentos" se não estiver na tela de edição -->
        <?php if ($paginaAtual !== 'usuario-editar.php'): ?>
            <a class="botaoAgendamentos" href="meusAgendamentos.php">Meus Agendamentos</a>
            <a class="botaoEditar" href="usuario-editar.php">Editar Informações</a>
        <?php endif; ?>

        <a class="botaoDeletar" href="deletar-usuario.php">Deletar Conta</a>
    </div>
<?php endif; ?>
