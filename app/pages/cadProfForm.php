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
        <img src="../../public/img/prof.jpg" alt="">
      </div>
      <div class="back">
        <img class="backImg" src="../../public/img/backImg.jpg" alt="">
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="form-header">
            <div class="title">
              Cadastro Docente
            </div>

            <div class="back-login">
              <div class="input-box">
                <a href="login.php">
                  <button>Fazer Login</button>
                </a>
              </div>
            </div>
          </div>
          <form action="../actions/cadastroProf.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-arrow-right"></i>
                <input type="text" id="name" name="name" placeholder="Insira seu nome completo " required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="Insira seu email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Insira sua senha" required>
              </div>
              <div class="input-box">
                <i class="fas fa-phone"></i>
                <input type="tel" id="phone-number" name="phone-number" placeholder="Insira o seu número de telefone" required>
              </div>
              <div class="input-box">
                <i class="fas fa-arrow-right"></i>
                <input type="text" id="cpf" name="cpf" placeholder="insira seu CPF" required>
              </div>

              <?php
              if (isset($_GET['msg'])) {
                echo $_GET['msg'];
              }
              ?>

              <div class="button input-box">
                <input type="submit" value="Cadastrar">
              </div>
              <div class="text sign-up-text">É discente? <a href="cadAlunoForm.php">Cadastrar como aluno</a></div>
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