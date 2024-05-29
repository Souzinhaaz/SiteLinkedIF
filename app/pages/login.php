<?php 

require_once("../config/loggedIn.php");

?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!-- Favicon -->
    <link href="../../public/img/globo.png" rel="icon">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/css/login.css">
  </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../../public/img/IF-BJL-Entrada-MAR-2022.jpg" alt="">
      </div>
      <div class="back">
        <img class="backImg" src="../../public/img/backImg.jpg" alt="">
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="../actions/verificationLogin.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="Insira seu email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Insira sua senha" required>
              </div>
              <div class="text"><a href="#">Esqueceu a senha?</a></div>
              <div class="button input-box">
                <input type="submit" value="Entrar">
              </div>
              <?php
                if (isset($_GET['msg'])) {
                  echo $_GET['msg'];
                }
              ?>
              <div class="text sign-up-text">Não tem uma conta ainda? <a href="cadAlunoForm.php">Cadastrar agora</a></div>
              <div class="text sign-up-text"><a href="../../index.php">Voltar página inicial</a></div>
            </div>
        </form>
      </div>

    </div>
    </div>
  </div>
  <script src="../../public/js/script.js"></script>
</body>
</html>
