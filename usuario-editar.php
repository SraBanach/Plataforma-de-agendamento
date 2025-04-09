<?php
session_start();

// Conexão com o banco
$dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);

$id_usuario = $_SESSION['usuario_id'];

// Buscar dados do usuário juntando tb_cad_usuario e tb_login
$busca = $banco->prepare("
    SELECT u.*, l.email, l.senha 
    FROM tb_cad_usuario u 
    JOIN tb_login l ON u.id_usuario = l.id_usuario 
    WHERE u.id_usuario = :id
");
$busca->execute([':id' => $id_usuario]);
$usuario = $busca->fetch(PDO::FETCH_ASSOC);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if (empty($nome) || empty($telefone) || empty($cpf) || empty($email) || empty($senha) || empty($confirmar_senha)) {
        echo "<script>alert('Por favor, preencha todos os campos.');</script>";
    } elseif ($senha !== $confirmar_senha) {
        echo "<script>alert('As senhas não coincidem.');</script>";
    } else {
        // Atualizar tb_cad_usuario
        $updateUsuario = $banco->prepare("
            UPDATE tb_cad_usuario 
            SET nome = :nome, telefone = :telefone, cpf = :cpf 
            WHERE id_usuario = :id
        ");
        $updateUsuario->execute([
            ':nome' => $nome,
            ':telefone' => $telefone,
            ':cpf' => $cpf,
            ':id' => $id_usuario
        ]);

        // Atualizar tb_login
        $updateLogin = $banco->prepare("
            UPDATE tb_login 
            SET email = :email, senha = :senha 
            WHERE id_usuario = :id
        ");
        $updateLogin->execute([
            ':email' => $email,
            ':senha' => $senha,
            ':id' => $id_usuario
        ]);

        $_SESSION['usuario_email'] = $email;
        echo "<script>
        alert('Dados atualizados com sucesso!');
        window.location.href = 'telaServico.php';
    </script>";
    exit();
    
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="./assets/css/telaUsuario.css">
</head>
<body>

<div class="telaUsuario">
    <div id="Dados">
        <h2>Editar Informações</h2>
        <div class="cadastro-conteiner">
            <form action="usuario-editar.php" method="POST">
                <h4>Nome completo</h4>
                <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>

                <h4>Telefone</h4>
                <input type="text" name="telefone" value="<?= $usuario['telefone'] ?>" required>

                <h4>CPF</h4>
                <input type="text" name="cpf" value="<?= $usuario['cpf'] ?>" required>

                <h4>Email</h4>
                <input type="email" name="email" value="<?= $usuario['email'] ?>" required>

                <h4>Senha</h4>
                <input type="password" name="senha" value="<?= $usuario['senha'] ?>" required>

                <h4>Confirmar Senha</h4>
                <input type="password" name="confirmar_senha" required>

                <button class="botaoSalvar" type="submit">Salvar</button>
            </form>
        </div>
    </div>

    <?php include 'includes/menu-usuario.php'; ?>
</div>

</body>
</html>
