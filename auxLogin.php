<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailFormulario = $_POST['email'];
    $senhaFormulario = $_POST['senha'];

    $dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $banco = new PDO($dsn, $user, $password);

    // Agora com JOIN para pegar também o nome do usuário
    $query = '
        SELECT l.*, u.nome 
        FROM tb_login l 
        JOIN tb_cad_usuario u ON l.id_usuario = u.id_usuario

        WHERE l.email = :email AND l.senha = :senha
    ';
    
    $stmt = $banco->prepare($query);
    $stmt->execute([
        ':email' => $emailFormulario,
        ':senha' => $senhaFormulario
    ]);

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $_SESSION['usuario_id'] = $resultado['id_usuario']; 
        $_SESSION['usuario_email'] = $resultado['email'];
        $_SESSION['usuario_nome'] = $resultado['nome']; // agora temos o nome 🎯

        header('Location: telaServico.php');
        exit;
    } else {
        echo "<script>
            alert('Usuário ou senha inválido. Tente novamente!');
            window.location.href = 'telaLogin.php?erro=usuarionaoencontrado';
        </script>";
        exit;
    }
}
?>

