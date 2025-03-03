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

$id_aluno = $_GET['id_aluno'];

//Parametros de conexao, pego esses valores da documentacao;
//127.0.0.1 = local 
////as vezes precisa de parametro para funcionar a extensao php debug mostra o que falta se passar mouse em cima; 
$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

//PDO =  biblioteca no padrao de uma classe; sempre que tiver a palavra new é pq estou fazendo uma conexao; 
//quando tivet type null não é obrigatorio ; 
//variavel banco recebe conexao com o banco ( as informacoes estao la; )
//$banco esta na rua(dsn), numero(user), chave(password)
$banco = new PDO($dsn, $user, $password);

//variavel sempre tem $ 
//variavel select, o que eu quero que liste a tabela de informação;  


$select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.id = tb_info_alunos.id_alunos WHERE tb_info_alunos.id_alunos =' .$id_aluno ;

//variavel banco -> consulta a variavel select -> e agora vc vai me retorno;
//e toda  vez que consulta ele vai guardar dentro da minha variavel dados;
$dados= $banco->query($select)->fetch();




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