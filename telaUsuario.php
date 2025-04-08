<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nomeFormulario = $telefoneFormulario = $dat_nascFormulario = $cpfFormulario = $enderecoFormulario = $email = '';

if (isset($_SESSION['usuario_id'])) {
    try {
        $dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $banco = new PDO($dsn, $user, $password);
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT u.*, l.email 
                    FROM tb_cad_usuario u 
                    JOIN tb_login l ON l.id_usuario = u.id_usuario 
                    WHERE u.id_usuario = :id";

        $stmt = $banco->prepare($query);
        $stmt->execute([':id' => $_SESSION['usuario_id']]);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            $nomeFormulario = $dados['nome'];
            $telefoneFormulario = $dados['telefone'];
            $cpfFormulario = $dados['cpf'];
            $email = $dados['email'];
        }

    } catch (PDOException $e) {
        echo "Erro ao buscar dados do usuário: " . $e->getMessage();
    }
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="./assets/css/telaUsuario.css">
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeFormulario = trim($_POST['nome']);
    $telefoneFormulario = trim($_POST['telefone']);
    $cpfFormulario = trim($_POST['cpf']);
    $email = trim($_POST['email']);
    $senhaFormulario = trim($_POST['senha']);
    $confirmarSenha = trim($_POST['confirmar_senha']);
    

    if ($senhaFormulario !== $confirmarSenha) {
        echo "<script>
            alert('As senhas não coincidem. Tente novamente.');
            window.history.back(); // Volta para a tela anterior (formulário)
        </script>";
        exit;
    }
    

    $senha = $_POST['senha'];


    // Verifica se algum campo está vazio
    if (empty($nomeFormulario) || empty($telefoneFormulario) || empty($cpfFormulario) ||  empty($email) || empty($_POST['senha'])) {
        echo "<script>alert('Por favor, preencha todos os campos antes de salvar.');</script>";
    } else {
        $dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $banco = new PDO($dsn, $user, $password);
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Primeiro, cadastra o usuário
        $insertUsuario = 'INSERT INTO tb_cad_usuario (nome, telefone,  cpf) VALUES (:nome, :telefone,  :cpf)';
        $stmtUsuario = $banco->prepare($insertUsuario);
        $stmtUsuario->execute([
            ':nome' => $nomeFormulario,
            ':telefone' => $telefoneFormulario,
            ':cpf' => $cpfFormulario,
        ]);

        $idUsuario = $banco->lastInsertId();

        // Agora, cadastra o login com o ID do usuário
        $insertLogin = 'INSERT INTO tb_login (email, senha, id_usuario) VALUES (:email, :senha, :id_usuario)';
        $stmtLogin = $banco->prepare($insertLogin);
        $stmtLogin->execute([
            ':email' => $email,
            ':senha' => $senha,
            ':id_usuario' => $idUsuario
        ]);

        echo "<script>alert('Cadastro concluído com sucesso!');
        window.location.href = 'telaLogin.php';
        </script>";
    }
}
?>


<div class="telaUsuario">
    <div id="Dados">
        <h2>
        <?php 
        echo isset($_SESSION['usuario_id']) ? 'Minhas Informações' : 'Cadastre-se';
        ?>
        </h2>

        <div class="cadastro-conteiner">
        <?php $somenteLeitura = isset($_SESSION['usuario_id']) ? 'readonly' : ''; ?>

<form action="telaUsuario.php" method="POST">
    <h4>Nome completo</h4>
    <input type="text" name="nome" value="<?= $nomeFormulario ?>" <?= $somenteLeitura ?>>

    <h4>Telefone</h4>
    <input type="text" name="telefone" value="<?= $telefoneFormulario ?>" <?= $somenteLeitura ?>>

    <h4>CPF</h4>
    <input type="text" name="cpf" value="<?= $cpfFormulario ?>" <?= $somenteLeitura ?>>

    <h4>Email</h4>
    <input type="email" name="email" value="<?= $email ?>" <?= $somenteLeitura ?>>

    <?php if (!isset($_SESSION['usuario_id'])): ?>
        <h4>Senha</h4>
        <input type="password" name="senha" placeholder="Digite sua senha">

        <h4>Confirmar Senha</h4>
        <input type="password" name="confirmar_senha" placeholder="Confirme sua senha">

        <br><br>
        <button class="botaoSalvar" type="submit">Cadastrar</button>
    <?php endif; ?>
</form>

        </div>
    </div>
    <?php
    $paginaAtual = basename($_SERVER['PHP_SELF']);
    ?>

    <?php if ($paginaAtual !== 'usuario-editar.php' && isset($_SESSION['usuario_id'])): ?>
        <?php include 'includes/menu-usuario.php'; ?>


<?php endif; ?>

</div>

</body>
</html>
