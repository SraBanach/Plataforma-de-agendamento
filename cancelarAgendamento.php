<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: telaLogin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $idAgendamento = $_POST['id'];
    $usuario_id = $_SESSION['usuario_id'];

    $dsn = 'mysql:host=127.0.0.1;dbname=db_plataformaagendamento';
    $user = 'root';
    $password = '';

    try {
        $banco = new PDO($dsn, $user, $password);
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Deleta o agendamento apenas se ele pertence ao usuário logado
        $sql = "DELETE FROM tb_agendamento WHERE id = :id AND id_login = :id_login";
        $stmt = $banco->prepare($sql);
        $stmt->bindParam(':id', $idAgendamento, PDO::PARAM_INT);
        $stmt->bindParam(':id_login', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Erro ao cancelar agendamento: " . $e->getMessage();
        exit;
    }
}
session_start();

// ... (sua lógica de cancelamento)

$_SESSION['mensagem_sucesso'] = "Agendamento cancelado com sucesso!";
header("Location: meusAgendamentos.php");
exit;


header("Location: meusAgendamentos.php");
exit;
