Precisa atualizar a tela... 



<?php

// echo '<h1>Aluno-deletar.php</h1>';

$dsn = 'mysql:dbname=db_agendamento
;host=127.0.0.1';
$user = 'root';
$password = '';

//no php tem uma biblioteca no padrao de uma classe; semore que tiver a palavra new é pq estou fazendo uma conexao; 
//quando tivet type null não é obrigatorio ; 
//variavel banco recebe conexao com o banco ( as informacoes estao la; )
$banco = new PDO($dsn, $user, $password);

$idFormulario = $_POST['id'];


//Apagando a tabela tb_alunos
// : = é como se fosse o @ no c#
$delete = 'DELETE FROM tb_login WHERE id = :id ';

//colcoanddo o scrip dentro do banco para preparar
$box = $banco->prepare($delete);


// metodo de envio -> GET: manda informações atraves da url E POST: manda informações atraves do corpo
// Action: ele é para onde deve enviar os dados

//execute do preparo feito acima;
$box->execute([
':id'=>$idFormulario
]);

//___________________________________

//Apagando a tabela tb_info_alunos

// : = é como se fosse o @ no c#
$delete = 'DELETE FROM tb_cad_usuario WHERE id = :id ';

//colcoanddo o scrip dentro do banco para preparar
$box = $banco->prepare($delete);


// metodo de envio -> GET: manda informações atraves da url E POST: manda informações atraves do corpo
// Action: ele é para onde deve enviar os dados

//execute do preparo feito acima;
$box->execute([
':id_alunos'=>$idFormulario
]);

//modal para usar no agendamento, tela que abre estilo o alert

// como criar alert e voltar para a tela de forma "automatica"
echo '<script>
    alert ("Usuario apagado com sucesso!!!!")
    window.location.replace("index.php")
    </script>';
// aqui muda o endereçamento da pagina -> header('location:index.php');


//var_dump para mostrar o que esta apagando, ultilizado somente pra controle;
//var_dump($box);