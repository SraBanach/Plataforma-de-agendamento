<!DOCTYPE html>
<html lang="pt-br
">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Usuario</title>
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
    echo "<script>alert('Cadastro concluído com sucesso!');</script>";
}
}
?>







        <div class="telaUsuario">
            <div id="Dados">
                <h2>Meus dados</h2>
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
                        <button class="botaoSalvar" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
            <div class="menu-usuario">
            <button class="botaoHistórico">
            <a href="histórico.php" >Histórico</a>
                <button class="botaoFavoritos">
    <a href="favoritos.php" >Favoritos</a>
                <button class="botaoAgendamento">
                <a href="agendamentos.php" >Agendamentos</a>
                <button class="botaoEditar">
    <a href="editar.php" >Editar Informações</a>
                <button class="botaoDeletar">
    <a href="deletar.php" >Deletar Conta</a>
</button>
            </div>
        </div>
</body>
</html>