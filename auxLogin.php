<?php



// Evita erros quando a página é carregada pela primeira vez (sem envio de formulário).
// O código dentro do if só roda após o envio dos dados.
if ($_SERVER["REQUEST_METHOD"] == "POST"){
//
// ordem importa o <pre> precisa estar encima do vardump
//echo '<pre>';
// $_post -> variavel global, ela funciona em todo o projeto.
// var_dump($_POST);

$emailFormulario = $_POST['email'];
$senhaFormulario = $_POST['senha'];

$dsn = 'mysql:dbname=db_agendamento;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);
 //tabela login
$insert = 'INSERT INTO tb_Login (email,senha) VALUES (:email,:senha)' ;

// o box vai guardar o banco preparado.
$box = $banco->prepare($insert);

// o box vai executar
$box->execute([
    ':email' => $emailFormulario,
    ':senha' => $senhaFormulario,

]);




$id = $banco -> lastInsertId();
}

    $queryUsuarioSenha = 'SELECT * FROM tb_login WHERE login = "' . $emailFormulario. '"AND senha = "' .$senhaFormulario .'"'; 
    //echo somente para visualizar 
    //echo $queryUsuarioSenha;
    //fetch para uma consulta unica, fetchAll para varios campos; 
    //quase sempre se le de tras pra frente = resultado do meu scrip do meu banco; 
    $resultado = $banco-> query($queryUsuarioSenha)->fetch(); 

    //var_dump ($resultado); 

    if (!empty($resultado)&& $resultado != false){ 
        header ('location:telaServico.php'); 

    }   else { 
        header('location:index.php'); 
    }
    ?>