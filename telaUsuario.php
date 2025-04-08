<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    
}
?>


<!DOCTYPE html>
<html lang="pt-br
">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="./assets/css/telaUsuario.css">

</head>
<body>

<!-- cadastrar usuario -->
<?php


// Evita erros quando a página é carregada pela primeira vez (sem envio de formulário).
// O código dentro do if só roda após o envio dos dados.
if ($_SERVER["REQUEST_METHOD"] == "POST"){
// ordem importa o <pre> precisa estar encima do vardump
//echo '<pre>';
// $_post -> variavel global, ela funciona em todo o projeto.
//var_dump($_POST);
 
$nomeFormulario = $_POST['nome'];
$telefoneFormulario = $_POST['telefone'];
$dat_nascFormulario = $_POST['dat_nasc'];
$cpfFormulario = $_POST['cpf'];
$enderecoFormulario = $_POST['endereco'];
 
 // Verificação se algum campo está vazio
 if (empty($nomeFormulario) || empty($telefoneFormulario) || empty($dat_nascFormulario) || empty($cpfFormulario) || empty($enderecoFormulario)) {
    echo "<script>alert('Por favor, preencha todos os campos antes de salvar.');</script>";
} else {
    $dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $banco = new PDO($dsn, $user, $password);

    $insert = 'INSERT INTO tb_cad_usuario (nome,telefone,dat_nasc,cpf,endereco) VALUES (:nome,:telefone,:dat_nasc,:cpf,:endereco)' ;
    $box = $banco->prepare($insert);
    $box->execute([
        ':nome' => $nomeFormulario,
        ':telefone' => $telefoneFormulario,
        ':dat_nasc' => $dat_nascFormulario,
        ':cpf' => $cpfFormulario,
        ':endereco' => $enderecoFormulario,
    ]);

    $id = $banco -> lastInsertId();
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
    if (isset($_SESSION['usuario_id'])) {
        echo 'Minhas Informações';
    } else {
        echo 'Cadastre-se';
    }
    ?>
</h2>
                <div class="cadastro-conteiner">
                    <form action="telaUsuario.php" method="POST">
                        <h4>Nome completo</h4>
                        <input type="text" id="campo1" placeholder="kenya banach" name="nome">
                        <br> 
                        <h4>Telefone</h4>
                        <input type="text" id="campo2" placeholder="(xx)xxxxx-xxxx" name="telefone">
                        <br>
                        <h4>Data nascimento</h4>
                        <input type="text" id="campo3" placeholder="xx/xx/xxxx" name="dat_nasc">
                        <br>
                        <h4>CPF</h4>
                        <input type="text" id="campo4" placeholder="xxx.xxx.xxx-xx" name="cpf">
                        <br>
                        <h4>Endereço</h4>
                        <input type="text" id="campo5" placeholder="bairro:   ; rua:  ; numero:    ;" name="endereco">
                        <br>
                            <li><a href="#" alt="icon"></a></li>
                        </ul>
                        <button class="botaoSalvar" type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
            <div class="menu-usuario">
    <?php
    var_dump($_SESSION); // apenas para testar

    if (isset($_SESSION['usuario_id'])):
        $id = $_SESSION['usuario_id'];
    ?>
        <a class="botaoAgendamentos" href="meusAgendamentos.php">Meus Agendamentos</a>
        <a class="botaoEditar" href="usuario-editar.php?id=<?= $id ?>">Editar Informações</a>
        <a class="botaoDeletar" href="usuario-editar.php?id=<?= $id ?>">Deletar Conta</a>
        <?php if (isset($_SESSION['usuario_id'])): ?>
    <a class="botaoLogout" href="logout.php">Sair</a>
<?php endif; ?>
    <?php else: ?>
        <!-- Não exibe nada se não estiver logado -->
    <?php endif; ?>
</div>
        </div>
</body>
</html>
