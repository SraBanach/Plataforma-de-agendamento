<?php
session_start();

// Conexão com o banco
$dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);

// Buscar dados do usuário logado
$id_usuario = $_SESSION['usuario_id'];
$busca = $banco->prepare("SELECT * FROM tb_cad_usuario WHERE id_usuario = :id");
$busca->execute([':id' => $id_usuario]);
$usuario = $busca->fetch(PDO::FETCH_ASSOC);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    // Verifica se todos os campos foram preenchidos
    if (empty($nome) || empty($telefone) ||  empty($cpf) ) {
        echo "<script>alert('Por favor, preencha todos os campos.');</script>";
    } else {
        $update = "UPDATE tb_cad_usuario SET nome = :nome, telefone = :telefone, cpf = :cpf WHERE id_usuario = :id";
        $box = $banco->prepare($update);
        $box->execute([
            ':nome' => $nome,
            ':telefone' => $telefone,
            ':cpf' => $cpf,
            ':id' => $id_usuario
        ]);
        echo "<script>alert('Dados atualizados com sucesso!');</script>";
        // Atualiza os dados na tela
        header("Location: usuario-editar.php");
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

                <button class="botaoSalvar" type="submit">Salvar</button>
            </form>
        </div>
    </div>

    <?php include 'includes/menu-usuario.php'; ?>
</div>

</body>
</html>
