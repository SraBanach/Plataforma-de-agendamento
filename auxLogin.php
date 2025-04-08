<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailFormulario = $_POST['email'];
    $senhaFormulario = $_POST['senha'];

    $dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $banco = new PDO($dsn, $user, $password);

    $query = 'SELECT * FROM tb_login WHERE email = :email AND senha = :senha';
    $stmt = $banco->prepare($query);
    $stmt->execute([
        ':email' => $emailFormulario,
        ':senha' => $senhaFormulario
    ]);

    $resultado = $stmt->fetch();

    if ($resultado) {
        $_SESSION['usuario_id'] = $resultado['id_login']; // CORRETAMENTE atribuído aqui
        $_SESSION['usuario_email'] = $resultado['email'];

        header('Location: telaServico.php');
        exit;
    } else {
        echo "<script>
            alert('Usuario ou Senha inválido. Tente novamente!');
            window.location.href = 'telaLogin.php?erro=usuarionaoencontrado';
        </script>";
        exit;
    }
}
?>


