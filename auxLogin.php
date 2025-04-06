<?php
session_start();

// Só executa se for um POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailFormulario = $_POST['email'];
    $senhaFormulario = $_POST['senha'];

    $dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $banco = new PDO($dsn, $user, $password);

    // Primeiro, verificar se o usuário existe no banco
    $query = 'SELECT * FROM tb_login WHERE email = :email AND senha = :senha';
    $stmt = $banco->prepare($query);
    $stmt->execute([
        ':email' => $emailFormulario,
        ':senha' => $senhaFormulario
    ]);

    $resultado = $stmt->fetch();

    if ($resultado) {
        // Usuário encontrado - salva os dados na sessão
        $_SESSION['usuario_id'] = $resultado['id_login']; // ou outro nome da coluna
        $_SESSION['usuario_email'] = $resultado['email'];

        header('Location: telaServico.php');
        exit;
    } else {
        // Usuário não encontrado
        header('Location: index.php?erro=usuarionaoencontrado');
        exit;
    }
}
?>