<?php
session_start();
require_once '../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../login/');
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
  <link rel="stylesheet" href="../src/css/style.css">
  <link rel="stylesheet" href="../src/css/games.css">
  <link rel="shortcut icon" href="../src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
  <title>Les mini-jeux - Disney & Pixar</title>
</head>

<body>
  <?php
  include '../config/includes/menuToggle.php';
  include '../config/includes/header.php';
  ?>
  <main>
    <h2>Les mini-jeux</h2>
    <?php
    if (isset($_GET['game_err'])) {
      $err = htmlspecialchars($_GET['game_err']);
      $score = htmlspecialchars($_GET['s']);

      switch ($err) {
        case 'success':
    ?>
          <div class="form-alert form-success">
            <h6>Succès</h6>
            <p>Vos choix ont bien été enregistré. Vous avez eu un score de <?php echo $score; ?> .</p>
          </div>
    <?php
          break;
        case 'escape':
          ?>
          <div class="form-alert form-success">
            <h6>Succès</h6>
            <p>Vous avez réussi l'escape game en <?php echo $score; ?> secondes.</p>
          </div>
    <?php
          break;
        case 'already':
    ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Vous avez déjà fait ce mini-jeu.</p>
          </div>
    <?php
          break;
      }
    }
    ?>
    <div class="games-box">
      <a class="games" id="sondages" href="sondages/">
        <h3>Les sondages</h3>
        <i class="fa-solid fa-list-check"></i>
      </a>
      <a class="games" id="quizz" href="quizz/">
        <h3>Les quizz</h3>
        <i class="fa-solid fa-question"></i>
      </a>
      <a class="games" id="paroles" href="paroles/">
        <h3>Terminez les paroles</h3>
        <i class="fa-solid fa-music"></i>
      </a>
      <a class="games" id="escape" href="escape/">
        <h3>Escape game</h3>
        <i class="fa-solid fa-person-running"></i>
      </a>
    </div>
  </main>
</body>

</html>