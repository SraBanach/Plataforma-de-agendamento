<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Usuario</title>
    <link rel="stylesheet" href="./assets/css/telaUsuario.css">

</head>
<body>
<?php

//
// ordem importa o <pre> precisa estar encima do vardump
echo '<pre>';
// $_post -> variavel global, ela funciona em todo o projeto.
// var_dump($_POST);
 
$nomeFormulario = $_POST['nome'];
$telefoneFormulario = $_POST['telefone'];
$dat_nascFormulario = $_POST['dat_nasc'];
$cpfFormulario = $_POST['cpf'];
$enderecoFormulario = $_POST['endereco'];
 
$dsn = 'mysql:dbname=db_agendamento;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);
 //tabela login
$insert = 'INSERT INTO tb_cad_usuario (nome,telefone,dat_nasc,cpf,endereco) VALUES (:nome,:telefone,:dat_nasc,:cpf,:endereco)' ;
 
// o box vai guardar o banco preparado.
$box = $banco->prepare($insert);
 
// o box vai executar
$box->execute([
    ':nome' => $nomeFormulario,
    ':telefone' => $telefoneFormulario,
    ':dat_nasc' => $dat_nascFormulario,
    ':cpf' => $cpfFormulario,
    ':endereco' => $enderecoFormulario,


]);
 
$id = $banco -> lastInsertId();

?>






        <div class="telaUsuario">
            <div id="Dados">
                <h2>Meus dados</h2>
                <div class="cadastro-conteiner">
                    <form action="dados.html" method="get">
                        <h4>Nome completo</h4>
                        <input type="Nome completo" id="campo1" placeholder="kenya banach" name="nome">
                        <br> 
                        <h4>Telefone</h4>
                        <input type="Telefone" id="campo2" placeholder="(xx)xxxxx-xxxx" name="Telefone">
                        <br>
                        <h4>Data nascimento</h4>
                        <input type="Data de nascimento" id="campo3" placeholder="xx/xx/xxxx" name="Data nascimento">
                        <br>
                        <h4>CPF</h4>
                        <input type="CPF" id="campo4" placeholder="xxx.xxx.xxx-xx" name="CPF">
                        <br>
                        <h4>Endereço</h4>
                        <input type="Endereço" id="campo5" placeholder="bairro:   ; rua:  ; numero:    ;" name="Endereço">
                        <br>
                            <li><a href="#" alt="icon"></a></li>
                        </ul>
                        <button class="botaoSalvar" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
            <div class="menu-usuario">
                <button class="botaoHistorico" type="text">Historico</button>
                <button class="botaoFavoritos" type="text">Favoritos</button>
                <button class="botaoAgendamentos" type="text">Agendamentos</button>
            </div>
        </div>
</body>
</html>