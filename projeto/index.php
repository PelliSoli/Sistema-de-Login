<?php
//Essa é a tela principal do sistema, onde será feito o login dos usuários
include ('conexao.php');

//Validação do login
if (isset ($_POST['email']) || isset ($POST['senha'])) {

   // Teste para verificar os campos vazios
   if (strlen($_POST['email']) == 0) {
      echo "Preencha seu e-mail no campo para efetuar o login";
   } else if (strlen($_POST['senha']) == 0) {
      echo "Preencha sua senha no campo para efetuar o login";
   } else {

      $email = $mysqli->real_escape_string($_POST['email']);
      $senha = $mysqli->real_escape_string($_POST['senha']);

      $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
      $sql_query = $mysqli->query($sql_code) or die ("Falha na execução de código SQL: " . $mysqli->error);

      $quantidade = $sql_query->num_rows;

      if ($quantidade == 1) {

         $usuario = $sql_query->fetch_assoc();

         if (!isset ($_SESSION)) {
            session_start();
         }

         $_SESSION['id'] = $usuario['id'];
         $_SESSION['nome'] = $usuario['nome'];

         header("Location: tela_cadastro.php");

      } else {
         echo "Falha ao logar! E-mail ou senha incorretos";
      }
   }

}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>Tela de login</title>
</head>

<body>
   <p>
   <div class="box">
      <form action="" method="POST">
         <fieldset>
            <legend><b>Acesse sua conta</b></legend>
            <br>
            <div class="inputBox">
               <input type="text" name="email" id="email" class="inputUser" required>
               <label for="email" class="labelInput">E-mail</label>
            </div>
            <br><br>
            <div class="inputBox">
               <input type="password" name="senha" id="password" class="inputUser" required>
               <label for="senha" class="labelInput">Senha</label>
            </div>
            <br><br>
            <button type="submit" id="submit" name="submit">Entrar</button>
         </fieldset>
      </form>
   </div>
   <p>
</body>

</html>