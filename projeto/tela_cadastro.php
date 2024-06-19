<?php
//Essa é a tela de cadastro de usuários do sistema
include ('protect.php');

if (isset($_POST['submit'])) {
   include_once ('conexao.php');

   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $senha = $_POST['senha'];

   //Validação para verificar se o email a ser cadastrado já está gravado no BD
   $result = mysqli_query($mysqli, "SELECT COUNT(*) FROM usuarios WHERE email = '$email'");
   $row = mysqli_fetch_row($result);

   if ($row[0] > 0) {
      echo '<script>alert("O email informado já está cadastrado no sistema.");</script>';
      echo '<script>history.back();</script>';
      exit;
   }

   //Verificação para a senha ser aceita no formato especificado(Com letras e números)
   if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $senha)) {
      echo '<script>alert("A senha deve conter pelo menos uma letra e um número.");</script>';
      echo '<script>history.back();</script>';
      exit;
   }
   //Esse echo foi criado após a gravação do vídeo de apresentação
   $result = mysqli_query($mysqli, "INSERT INTO usuarios(nome,email,senha) 
        VALUES ('$nome','$email','$senha')");
   echo '<script>alert("O Novo Usuário foi cadastrado :)");</script>';
   echo '<script>history.back();</script>';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>Painel</title>
</head>

<body>
   <p>
   <div class="box">
      <h1>Bem vindo
         <?php echo $_SESSION['nome']; ?>
      </h1>
      <form action="" method="POST">
         <fieldset>
            <legend><b>Cadastre o novo usuário</b></legend>
            <br>
            <div class="inputBox">
               <input type="text" name="nome" id="nome" class="inputUser">
               <label for="nome" class="labelInput">Nome</label>
            </div>
            <br><br>
            <div class="inputBox">
               <input type="text" name="email" id="email" class="inputUser">
               <label for="email" class="labelInput">E-mail</label>
            </div>
            <br><br>
            <div class="inputBox">
               <input type="password" name="senha" id="password" class="inputUser">
               <label for="senha" class="labelInput">Senha (Deve conter letras e números)</label>
            </div>
            <br><br>
            <button type="submit" id="submit" name="submit">Entrar</button>
            <br><br>
            <button id="logout"><a href="logout.php">Sair</a>
         </fieldset>
      </form>
   </div>
   <p>
</body>

</html>