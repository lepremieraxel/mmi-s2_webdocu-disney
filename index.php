<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/e0b8ba43a6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="shortcut icon" href="src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
  <title>Accueil - Disney & Pixar</title>
</head>

<body>
  <?php
  include 'config/includes/menuToggle.php';
  include 'config/includes/header.php';
  ?>
  <div class="btn-user mobile-active">
    <a href="user/"><i class="fa-solid fa-circle-user"></i></a>
  </div>
  <div class="disney-bg">
    <video src="src/img/intro-disney.mp4" autoplay muted loop></video>
    <div class="main_title">
      <h1>Bienvenue dans le monde incroyable de</h1>
      <img src="src/img/disneyPixar.png">
    </div>
  </div>
  <img src="src/img/disneyPixarMobile.png" class="logo-mobile">
  <main>
    <div class="yt-video">
      <h2>Vidéo de Jade</h2>
      <iframe class="yt-desk" width="640" height="360" src="https://www.youtube.com/embed/6kgrdRfZD3I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <a href="https://youtu.be/6kgrdRfZD3I"><img src="src/img/thumbnail-yt.png"></a>
    </div>
  </main>
</body>

</html>