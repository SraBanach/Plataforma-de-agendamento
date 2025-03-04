<?php include'./includes/header.php' ?>
<nav>

<ul class="menu">
    <li><a href= "#">Sobrancelhas</a> </li>
    <li><a href= "#">Unhas</a> </li>
    <li><a href= "#">Cilios</a> </li>
    <li><a href= "#">Maquiagem</a> </li>
</ul>
</nav>

<?php include'./includes/saloes_lista.php' ?>



<!--  
// echo $id;
 
// ---------------------------------------------------------------
//tabela cadastro
// $insert = 'INSERT INTO tb_Login (email,senha)  VALUES (:email,:senha)';
 
// $bancoprepara = $banco->prepare($insert);
 
// $bancoprepara->execute([
//     ':email' => $emailFormulario,
//     ':senha' => $senhaFormulario,
// ]);

//----------------


// Verifica se o formulário foi enviado via POST
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Verifica se os campos foram preenchidos antes de acessá-los
//     $email = isset($_POST['email']) ? $_POST['email'] : null;
//     $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

//     if (!empty($email) && !empty($senha)) {
//         echo "Login com sucesso!"; 
//         // Aqui você pode adicionar a lógica para verificar o login no banco de dados
//     } else {
//         echo "Preencha todos os campos!";
//     }
// } else {
//     echo "Acesso inválido!";
// }
?> -->