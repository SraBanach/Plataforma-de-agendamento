<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./assets/css/telaLogin.css">
</head>
<body>
<?php

//Parametros
////as vezes precisa de parametro para funcionar a extensao php debug mostra o que falta se passar mouse em cima; 
$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

//no php tem uma biblioteca no padrao de uma classe; semore que tiver a palavra new é pq estou fazendo uma conexao; 
//quando tivet type null não é obrigatorio ; 
//variavel banco recebe conexao com o banco ( as informacoes estao la; )
$banco = new PDO($dsn, $user, $password);

//variavel sempre tem $ 
//variavel select, o que eu quero que liste  
$select = 'SELECT * FROM tb_Login';

//comando para executar, para rodar; 
//varivel resultado com a junção de banco com select; 
//fetchAll para buscar todas as informaçoes; 
$resultado = $banco->query($select)->fetchAll();

//para organizar o arquivo abaixo, sempre colocar antes do var_dump;
//somente para eu ver, nao no projeto; 
//echo '<pre>';

//comando echo apenas exibe o resultado de tudo; 
//var_dump ele faz um debug da variavel, lembrar de colocar (), mostra tipo de elemento; mas aparece tudo sem organizar, tudo confuso; 
//var_dump($resultado);
?>
    <section class="telaLogin">
        <div id="login">
            <h1>Nome site</h1>
            <div class="login-conteiner">
                <h2>Login</h2>
                <form action="dados.html" method="POST">
                    <input type="email" id="campo1" placeholder="username@gmail.com" name="email">
                    <br> 
                    <input type="text" id="campo2" placeholder="**********" name="senha">
                    <br>
                    <p> ou continue com </p>
                    <ul class="social">
                        <li><a href="#" alt="icon"></a></li>
                        <!-- <a href="./telaUsuario.php" class="cadastro"></a> não tem um cadastro? Clique Aqui! -->
                    </ul>
                    <a href="./telaServico.php" class="botaoLogin"> Entrar
                        <!-- <button class="botaoLogin">Entrar</button> -->
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