<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Linkedif</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Favicon -->
  <link href="../../public/img/globo.png" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="../../public/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="../../public/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="home.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h2 class="m-0 text-primary d-flex align-items-center gap-2">
        <img src="../../public/img/globo.png" height="60vw"> LinkedIF
      </h2>
    </a>

    <div class="message-profile">
      <h3 class="m-0 text-primary d-flex align-items-center gap-2">
        <?php
        if (isset($_SESSION['name'])) {
          echo "Seja bem-vindo, " . $_SESSION['name'];
        } else {
          echo "Bem-vindo, visitante!";
        }
        ?>
      </h3>
    </div>

    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="#" class="nav-item nav-link active">Pagina Inicial</a>
        <a href="cursos.php" class="nav-item nav-link">Cursos</a>
        <a href="https://wa.me/557799155669" target="_blank" class="nav-item nav-link">Contato</a>
      </div>
      <a href="login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Entre aqui<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Opções Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-3 col-sm-6">
          <div class="service-item text-center pt-3">
            <div class="p-4">
              <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
              <h5 class="mb-3">Instrutores Qualificados</h5>
              <p>Matériais produzidos de alunos para alunos, com o auxilio dos professores do institutuo</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="service-item text-center pt-3">
            <div class="p-4">
              <i class="fa fa-3x fa-globe text-primary mb-4"></i>
              <h5 class="mb-3">Aulas Online</h5>
              <p>Aulas ministradas por professores qualificados na área e com total suporte aos alunos.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="service-item text-center pt-3">
            <div class="p-4">
              <i class="fa fa-3x fa-home text-primary mb-4"></i>
              <h5 class="mb-3">Projetos Principais</h5>
              <p>Ajudar os alunos a ingressar no IF Baiano, tornando de facil entendimento os editais disponibilizados.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="service-item text-center pt-3">
            <div class="p-4">
              <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
              <h5 class="mb-3">Biblioteca de Conteúdos</h5>
              <p>Disponibilização dos principais editais sobre o IFBaiano e sobre a inscrição.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Opções End -->

  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow " data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col">
          <h4 class="text-white mb-3">Links</h4>
          <a class="btn btn-link" href="">Sobre Nós</a>
          <a class="btn btn-link" href="">Nos Contate</a>
          <a class="btn btn-link" href="">FAQs e Ajuda</a>
        </div>
        <div class="col">
          <h4 class="text-white mb-3">Contact</h4>
          <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>77 9 12345678</p>
          <p class="mb-2"><i class="fa fa-envelope me-3"></i>projetolinkedif@gmail.com</p>
          <div class="d-flex pt-2">
            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
          </div>
        </div>

        <div class="container">
          <div class="copyright">
            <div class="row">
              <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                Designed By <a class="border-bottom" href="areaAluno.php">Gustavo de Souza, Keyla Rodrigues, Noemi Santos, Pedro Augusto, Riquele Maicana e Shayara Mary</a>
              </div>
              <div class="col-md-6 text-center text-md-end">
                <div class="footer-menu">
                  <a href="">Home</a>
                  <a href="">Suporte</a>
                  <a href="">FAQs</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="../../public/js/main.js"></script>
</body>

</html>