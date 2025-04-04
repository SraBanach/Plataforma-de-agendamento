<?php include'./includes/header.php' ?>
<nav>

<ul class="menu">
    <li><a href= "#">Sobrancelhas</a> </li>
    <li><a href= "#">Unhas</a> </li>
    <li><a href= "#">Cilios</a> </li>
    <li><a href= "#">Maquiagem</a> </li>
</ul>
</nav>

<?php

//se id existe e esta diferente de sazio ou seja se ele esta preenchido ele redireciona para saloes lista, se nao volta para o index; 
//if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    include'./includes/saloes_lista.php' ;
//} else {
//    header('location:index.php');
//}
?>


