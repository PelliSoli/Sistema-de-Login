<?php

// Essa tela serve para impedir que um usuário não logado acesse a página de cadastro
if (!isset ($_SESSION)) {
   session_start();
}

if (!isset ($_SESSION['id'])) {
   die ("OPSSSS!!!<p>Você não pode acessar esta página sem estar logado.<p><a href=\"index.php\">Clique aqui</a> para ser direcionado para a tela de login</p>");
}

?>