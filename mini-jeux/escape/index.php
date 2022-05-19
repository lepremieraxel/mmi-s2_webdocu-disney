<?php
session_start();
require_once '../../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../../login/');
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
  <link rel="stylesheet" href="../../src/css/escape.css">
  <link rel="shortcut icon" href="../../src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
  <title>Les films - Disney & Pixar</title>
</head>

<body>
  <?php
  include '../../config/includes/menuToggle.php';
  include '../../config/includes/header.php';
  ?>
  <main class="escape-main">
    <h2>L'escape game</h2>
    <?php
    if (isset($_GET['e'])) {
      $err = htmlspecialchars($_GET['e']);

      switch ($err) {
        case 'false':
    ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Vous vous êtes trompé de code. Réessayez.</p>
          </div>
    <?php
          break;
      }
    }
    ?>
    <div class="container-escape-mobile">
      <h3>L'escape game n'est pas disponible pour votre taille d'écran. Passez sur ordinateur pour pouvoir y jouer.</h3>
    </div>
    <div class="container-escape">
      <div class="timer">
        <p class="timer-text"></p>
        <button><i class="fa-solid fa-pause"></i></button>
      </div>
      <img src="elements/lahaut.png" alt="Maison de Là Haut" class="element-escape cliquable" id="lahaut">
      <img src="elements/fenetre.png" class="element-escape" id="fenetre">
      <img src="elements/tapis.png" class="element-escape cliquable" id="tapis">
      <img src="elements/affiche.png" class="element-escape cliquable" id="affiche">
      <img src="elements/bureau.png" class="element-escape" id="bureau">
      <img src="elements/tasse.png" class="element-escape cliquable" id="tasse">
      <img src="elements/dessin.png" class="element-escape cliquable" id="dessin">
      <img src="elements/lampe.png" class="element-escape cliquable" id="lampe">
      <img src="elements/etagere_base.png" class="element-escape" id="etagere_base">
      <img src="elements/aquarium.png" class="element-escape cliquable" id="aquarium">
      <img src="elements/etagere_haut.png" class="element-escape" id="etagere_haut">
      <img src="elements/olaf.png" class="element-escape cliquable" id="olaf">
      <img src="elements/chaise.png" class="element-escape" id="chaise">
      <img src="elements/chevet.png" class="element-escape" id="chevet">
      <img src="elements/montre.png" class="element-escape cliquable" id="montre">
      <img src="elements/lit.png" class="element-escape" id="lit">
      <img src="elements/winnie.png" class="element-escape cliquable" id="winnie">
      <img src="elements/porte.png" class="element-escape cliquable" id="porte">
      <img src="elements/livres.png" class="element-escape cliquable" id="livres">
      <img src="elements/cadre.png" class="element-escape cliquable" id="cadre">
      <img src="elements/coffre.png" class="element-escape coffre" id="coffre">
    </div>
  </main>
  <script src="../../src/js/escape.js"></script>
</body>

</html>