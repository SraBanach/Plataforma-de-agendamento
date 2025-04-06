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
    $dat_nasc = $_POST['dat_nasc'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];

    // Verifica se todos os campos foram preenchidos
    if (empty($nome) || empty($telefone) || empty($dat_nasc) || empty($cpf) || empty($endereco)) {
        echo "<script>alert('Por favor, preencha todos os campos.');</script>";
    } else {
        $update = "UPDATE tb_cad_usuario SET nome = :nome, telefone = :telefone, dat_nasc = :dat_nasc, cpf = :cpf, endereco = :endereco WHERE id_usuario = :id";
        $box = $banco->prepare($update);
        $box->execute([
            ':nome' => $nome,
            ':telefone' => $telefone,
            ':dat_nasc' => $dat_nasc,
            ':cpf' => $cpf,
            ':endereco' => $endereco,
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

                <h4>Data de nascimento</h4>
                <input type="text" name="dat_nasc" value="<?= $usuario['dat_nasc'] ?>" required>

                <h4>CPF</h4>
                <input type="text" name="cpf" value="<?= $usuario['cpf'] ?>" required>

                <h4>Endereço</h4>
                <input type="text" name="endereco" value="<?= $usuario['endereco'] ?>" required>

                <button class="botaoSalvar" type="submit">Salvar</button>
            </form>
        </div>
    </div>

    <div class="menu-usuario">
        <a class="botaoAgendamentos" href="meus-agendamentos.php">Meus Agendamentos</a>
        <a class="botaoEditar" href="usuario-editar.php">Editar Informações</a>
        <a class="botaoDeletar" href="deletar-usuario.php">Deletar Conta</a>
    </div>
</div>

</body>
</html>
