<?php
session_start();
session_unset(); // remove todas as variáveis da sessão
session_destroy(); // encerra a sessão

header('Location: index.php'); // volta pra tela de login
exit;
?>