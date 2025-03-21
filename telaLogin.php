<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./assets/css/telaLogin.css">
</head>
<body>

<!-- cadastrar login -->

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
 
$dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
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


//abaixo se encontra metodo para nao aparacer a mensasagem de erro quando entra na tela de login
// echo '<pre>';

//  Verifica se o formulário foi enviado via POST
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//      Verifica se os campos existem antes de acessá-los
//     $emailFormulario = isset($_POST['email']) ? $_POST['email'] : null;
//     $senhaFormulario = isset($_POST['senha']) ? $_POST['senha'] : null;

//     if (!empty($emailFormulario) && !empty($senhaFormulario)) {
//         $dsn = 'mysql:dbname=db_agendamento;host=127.0.0.1';
//         $user = 'root';
//         $password = '';
//         $banco = new PDO($dsn, $user, $password);

//         Inserção no banco
//         $insert = 'INSERT INTO tb_Login (email, senha) VALUES (:email, :senha)';
//         $box = $banco->prepare($insert);
//         $box->execute([
//             ':email' => $emailFormulario,
//             ':senha' => $senhaFormulario,
//         ]);

//         $id = $banco->lastInsertId();
//         echo "Login realizado com sucesso!" . $id;
//     } else {
//         echo "Preencha todos os campos!";
//     }
// } else {
//     echo "";
// }

?>








    <section class="telaLogin">
        <div id="login">
            <h1>Nome site</h1>
            <div class="login-conteiner">
                <h2>Login</h2>
                <form action="#telaLogin.php" method="POST">
                    <input type="email" id="campo1" placeholder="username@gmail.com" name="email">
                    <br> 
                    <input type="password" id="campo2" placeholder="**********" name="senha">
                    <br>
                    <p> ou continue com </p>
                    <ul class="social">
                        <li><a href="#" alt="icon"></a></li>
                        <!-- <a href="./telaUsuario.php" class="cadastro"></a> não tem um cadastro? Clique Aqui! -->
                    </ul>
                    <!-- <button type="submit" class="botaoLogin">Entrar</button> -->
                        <!-- <button class="botaoLogin">Entrar</button>-->
                        <input type="submit">
                    </a>
                </form>
            </div>
            <section class="cadastro">
                <a href="./telaUsuario.php"> proprietario de uma empresa? <br> Se cadastre aqui!</a>
            </section>
        </div>
        <div class="fotosvg">
            <svg xmlns="http://www.w3.org/2000/svg" width="188" height="1024" viewBox="50 80 188 1024" fill="none">
                <path d="M187.611 0.190674L180.956 34.6841C174.561 69.1751 160.859 138.165 158.232 207.055C155.605 275.944 162.749 344.743 149.699 413.728C136.649 482.712 102.102 551.893 99.4748 620.782C96.8476 689.671 124.837 758.28 132.633 827.074C140.429 895.868 126.727 964.858 120.332 999.349L113.677 1033.84L9.44896 1034.8L9.13399 1000.37C8.81903 965.937 8.1891 897.078 7.55917 828.218C6.92924 759.359 6.29931 690.5 5.66938 621.641C5.03945 552.781 4.40952 483.922 3.77959 415.063C3.14966 346.203 2.51973 277.344 1.8898 208.485C1.25987 139.626 0.629937 70.7662 0.314972 36.3366L7.40977e-06 1.90695L187.611 0.190674Z" fill="#F3E2D9"/>
            </svg>
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="188" height="1000" viewBox="50 350 188 1024" fill="none">
                <path d="M187.611 0.190674L180.956 34.6841C174.561 69.1751 160.859 138.165 158.232 207.055C155.605 275.944 162.749 344.743 149.699 413.728C136.649 482.712 102.102 551.893 99.4748 620.782C96.8476 689.671 124.837 758.28 132.633 827.074C140.429 895.868 126.727 964.858 120.332 999.349L113.677 1033.84L9.44896 1034.8L9.13399 1000.37C8.81903 965.937 8.1891 897.078 7.55917 828.218C6.92924 759.359 6.29931 690.5 5.66938 621.641C5.03945 552.781 4.40952 483.922 3.77959 415.063C3.14966 346.203 2.51973 277.344 1.8898 208.485C1.25987 139.626 0.629937 70.7662 0.314972 36.3366L7.40977e-06 1.90695L187.611 0.190674Z" fill="#F3E2D9"/>
                </svg> -->
        <img src="./assets/img/beauty-salon.jpg" alt="foto de um salao" class="fototelalogin">
        </div>
    </section>
    
</body>
</html>