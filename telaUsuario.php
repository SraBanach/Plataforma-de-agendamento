<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
    $dat_nascFormulario = trim($_POST['dat_nasc']);
    $cpfFormulario = trim($_POST['cpf']);
    $enderecoFormulario = trim($_POST['endereco']);
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
    if (empty($nomeFormulario) || empty($telefoneFormulario) || empty($dat_nascFormulario) || empty($cpfFormulario) || empty($enderecoFormulario) || empty($email) || empty($_POST['senha'])) {
        echo "<script>alert('Por favor, preencha todos os campos antes de salvar.');</script>";
    } else {
        $dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $banco = new PDO($dsn, $user, $password);
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Primeiro, cadastra o usuário
        $insertUsuario = 'INSERT INTO tb_cad_usuario (nome, telefone, dat_nasc, cpf, endereco) VALUES (:nome, :telefone, :dat_nasc, :cpf, :endereco)';
        $stmtUsuario = $banco->prepare($insertUsuario);
        $stmtUsuario->execute([
            ':nome' => $nomeFormulario,
            ':telefone' => $telefoneFormulario,
            ':dat_nasc' => $dat_nascFormulario,
            ':cpf' => $cpfFormulario,
            ':endereco' => $enderecoFormulario
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
    <div style="height: 80px;"></div> <!-- Espaço no topo -->

<div class="telaUsuario">
    <div id="Dados">
        <h2>
        <?php 
        echo isset($_SESSION['usuario_id']) ? 'Minhas Informações' : 'Cadastre-se';
        ?>
        </h2>

        <div class="cadastro-conteiner">
            <form action="telaUsuario.php" method="POST">
                <h4>Nome completo</h4>
                <input type="text" id="campo1" placeholder="name" name="nome" value="<?= $_POST['nome'] ?? '' ?>">

                <h4>Telefone</h4>
                <input type="text" id="campo2" placeholder="(xx)xxxxx-xxxx" name="telefone" value="<?= $_POST['telefone'] ?? '' ?>">

                <h4>Data nascimento</h4>
                <input type="text" id="campo3" placeholder="xx/xx/xxxx" name="dat_nasc" value="<?= $_POST['dat_nasc'] ?? '' ?>">

                <h4>CPF</h4>
                <input type="text" id="campo4" placeholder="xxx.xxx.xxx-xx" name="cpf" value="<?= $_POST['cpf'] ?? '' ?>">

                <h4>Endereço</h4>
                <input type="text" id="campo5" placeholder="bairro: ; rua: ; numero: ;" name="endereco" value="<?= $_POST['endereco'] ?? '' ?>">

                <h4>Email</h4>
                <input type="email" name="email" placeholder="seuemail@email.com" value="<?= $_POST['email'] ?? '' ?>">

                <h4>Senha</h4>
                <input type="password" name="senha" placeholder="Digite sua senha">

                <h4>Confirmar Senha</h4>
                <input type="password" name="confirmar_senha" placeholder="Confirme sua senha">
                <br><br>
                <button class="botaoSalvar" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
    <?php
    $paginaAtual = basename($_SERVER['PHP_SELF']);
    ?>

    <?php if ($paginaAtual !== 'usuario-editar.php' && isset($_SESSION['usuario_id'])): ?>
        <div class="menu-usuario">
            <a class="botaoAgendamentos" href="meusAgendamentos.php">Meus Agendamentos</a>
            <a class="botaoEditar" href="usuario-editar.php?id=<?= $_SESSION['usuario_id'] ?>">Editar Informações</a>
            <a class="botaoDeletar" href="usuario-editar.php?id=<?= $_SESSION['usuario_id'] ?>">Deletar Conta</a>
            <a class="botaoLogout" href="logout.php">Sair</a>
        </div>
<?php endif; ?>

</div>

</body>
</html>
