<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: telaLogin.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Conexão com o banco
$dsn = 'mysql:host=127.0.0.1;dbname=db_plataformaagendamento';
$user = 'root';
$password = '';

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Busca os agendamentos do usuário logado
    $sql = "SELECT * FROM tb_agendamento WHERE id_login = :id_login ORDER BY data_agendamento DESC";
    $stmt = $banco->prepare($sql);
    $stmt->bindParam(':id_login', $usuario_id, PDO::PARAM_INT);
    $stmt->execute();

    $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erro ao conectar ao banco: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meus Agendamentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/css/meusAgendamentos.css">
</head>
<body>
<?php
if (isset($_SESSION['mensagem_sucesso'])) {
    echo '<div class="mensagem-sucesso">' . $_SESSION['mensagem_sucesso'] . '</div>';
    unset($_SESSION['mensagem_sucesso']);
}
?>

    <div class="container-agendamentos">
        <h2><i class="bi bi-calendar-check"></i> Meus Agendamentos</h2>

        <?php if (count($agendamentos) > 0): ?>
            <div class="lista-agendamentos">
                <?php foreach ($agendamentos as $agendamento): ?>
                    <div class="item-agendamento">
                        <p><strong>Serviço:</strong> <?= htmlspecialchars($agendamento['servico']) ?></p>
                        <p><strong>Valor:</strong> R$ <?= number_format($agendamento['valor'], 2, ',', '.') ?></p>
                        <p><strong>Horário:</strong> <?= htmlspecialchars($agendamento['horario']) ?></p>
                        <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($agendamento['data_agendamento'])) ?></p>
                        <p><strong>Observações:</strong> <?= isset($agendamento['observacoes']) && $agendamento['observacoes'] !== '' ? htmlspecialchars($agendamento['observacoes']) : 'Nenhuma' ?></p>

                        <form method="POST" action="cancelarAgendamento.php" onsubmit="return confirm('Tem certeza que deseja cancelar este agendamento?');">
                        <input type="hidden" name="id" value="<?= $agendamento['id'] ?>">
                            <button type="submit" class="botaoCancelar"><i class="bi bi-x-circle"></i> Cancelar</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="sem-agendamentos"><i class="bi bi-info-circle"></i> Você ainda não possui agendamentos.</p>
        <?php endif; ?>

        <a href="telaServico.php" class="botaoVoltar"><i class="bi bi-arrow-left"></i> Voltar para os serviços</a>
    </div>
</body>
</html>
