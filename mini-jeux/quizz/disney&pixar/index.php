<?php
session_start();
require_once '../../../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../../../login/');
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
  <link rel="stylesheet" href="../../../src/css/style.css">
  <link rel="stylesheet" href="../../../src/css/games.css">
  <link rel="shortcut icon" href="../../../src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
  <title>Disney & Pixar - Disney & Pixar</title>
</head>

<body>
  <div class="menuToggle">
    <input type="checkbox" />
    <span></span>
    <span></span>
    <span></span>
    <ul class="menu">
      <li><a href="../../../"><i class="fa-solid fa-house"></i> Accueil</a></li>
      <li><a href="../../../mini-jeux/"><i class="fa-solid fa-chess"></i> Les mini-jeux</a></li>
      <li><a href="../../../forum/"><i class="fa-solid fa-message"></i> Forum</a></li>
      <li><a href="../../../about/"><i class="fa-solid fa-users"></i> à propos</a></li>
    </ul>
  </div>
  <a href="../../../user/" class="user-mobile"><i class="fa-solid fa-circle-user"></i></a>
  <header>
    <a href="../../../"><img src="../../../src/img/disneyPixar.png" alt="disney et pixar"></a>
    <nav>
      <a href="../../../"><i class="fa-solid fa-house"></i> Accueil</a>
      <a href="../../../mini-jeux/"><i class="fa-solid fa-chess"></i> Les mini-jeux</a>
      <a href="../../../forum/"><i class="fa-solid fa-message"></i> Forum</a>
      <a href="../../../about/"><i class="fa-solid fa-users"></i> à propos</a>
    </nav>
    <a href="../../../user/" class="user"><i class="fa-solid fa-circle-user"></i></a>
  </header>
  <main>
    <h2>Disney & Pixar</h2>
    <div class="quizz-container">
      <form action="quizz.php" method="post">
        <div class="quizz-page" id="question1">
          <h3>Que signifie "Hakuna matata" dans Le Roi Lion ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-a" value=1 required>
              <label for="q1-a">
                <p>Pas de soucis</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-b" value=0 required>
              <label for="q1-b">
                <p>Profite de la vie</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-c" value=0 required>
              <label for="q1-c">
                <p>Le meilleur est à venir</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</body>

</html>