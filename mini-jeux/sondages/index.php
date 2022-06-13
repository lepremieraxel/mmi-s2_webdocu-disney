<?php
session_start();
require_once '../../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../../login/index.php?t=sondages');
  die();
}
$req = $bdd->prepare('SELECT * FROM users WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/e0b8ba43a6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../src/css/style.css">
  <link rel="stylesheet" href="../../src/css/games.css">
  <link rel="shortcut icon" href="../../src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
  <title>Les sondages - Disney & Pixar</title>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-DQYN3X35L5"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-DQYN3X35L5');
  </script>
</head>

<body>
  <?php
  include '../../config/includes/menuToggle.php';
  include '../../config/includes/header.php';
  ?>
  <main>
    <h2>Les sondages</h2>
    <?php
    if (isset($_GET['game_err'])) {
      $err = htmlspecialchars($_GET['game_err']);

      switch ($err) {
        case 'success':
    ?>
          <div class="form-alert form-success">
            <h6>Succès</h6>
            <p>Vos choix ont bien été enregistré.</p>
          </div>
    <?php
          break;
      }
    }
    ?>
    <div class="games-box">
      <a href="princess/" id="princess" class="games">
        <h3>Les princesses</h3>
        <i class="fa-solid fa-crown"></i>
      </a>
      <a href="personnages/" id="personnages" class="games">
        <h3>Les personnages</h3>
        <i class="fa-solid fa-person"></i>
      </a>
      <a href="movies/" id="movies" class="games">
        <h3>Les films</h3>
        <i class="fa-solid fa-film"></i>
      </a>
    </div>
  </main>
  <?php include '../../config/includes/footer.php';?>
</body>

</html>