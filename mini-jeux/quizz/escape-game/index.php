<?php
session_start();
require_once '../../../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../../../login/index.php?t=quizz/escape-game');
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
  <title>Avez-vous bien suivi l'escape game ? - Disney & Pixar</title>
</head>

<body>
  <?php
  include '../../../config/includes/menuToggle.php';
  include '../../../config/includes/header.php';
  ?>
  <main>
    <h2>Avez-vous bien suivi l'escape game ?</h2>
    <?php
    if (isset($_GET['quizz_err'])) {
      $err = htmlspecialchars($_GET['quizz_err']);

      switch ($err) {
        case 'empty':
    ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Veuillez faire un choix dans chaque cas.</p>
          </div>
        <?php
          break;

        case 'already':
        ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Vous avez déjà répondu à ce quizz.</p>
          </div>
    <?php
          break;
      }
    }
    ?>
    <div class="quizz-container">
      <form action="quizz.php" method="post">
        <div class="quizz-page" id="question1">
          <h3>Dans quel Disney le héros se déplace-t-il en tapis ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-a" value=0 required>
              <label for="q1-a">
                <p>Merlin l’Enchanteur</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-b" value=1 required>
              <label for="q1-b">
                <p>Aladdin</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-c" value=0 required>
              <label for="q1-c">
                <p>Peter Pan</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question2">
          <h3>Quel personnage se nomme Olaf ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-a" value=1 required>
              <label for="q2-a">
                <p>Un bonhomme de neige</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-b" value=0 required>
              <label for="q2-b">
                <p>Un poisson</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-c" value=0 required>
              <label for="q2-c">
                <p>Un renne</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question3">
          <h3>Quel est l’animal nommé Robin des Bois ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-a" value=0 required>
              <label for="q3-a">
                <p>Un loup</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-b" value=1 required>
              <label for="q3-b">
                <p>Un renard</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-c" value=0 required>
              <label for="q3-c">
                <p>Un chien</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question4">
          <h3>Par quel moyen s’envole la maison dans Là-Haut ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-a" value=0 required>
              <label for="q4-a">
                <p>Des ailes</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-b" value=1 required>
              <label for="q4-b">
                <p>Des ballons</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-c" value=0 required>
              <label for="q4-c">
                <p>Des réacteurs</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question5">
          <h3>Quels stickers sont présents sur la porte de la chambre de Bouh dans Monstres et Cie ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-a" value=1 required>
              <label for="q5-a">
                <p>Des fleurs</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-b" value=0 required>
              <label for="q5-b">
                <p>Des voitures</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-c" value=0 required>
              <label for="q5-c">
                <p>Des oiseaux</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question6">
          <h3>Quel motif se répète sur le mur de la chambre dans Toy Story ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-a" value=1 required>
              <label for="q6-a">
                <p>Des nuages</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-b" value=0 required>
              <label for="q6-b">
                <p>Des étoiles</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-c" value=0 required>
              <label for="q6-c">
                <p>Des arbres</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question7">
          <h3>Quel Disney a pour héros un poisson clown ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q7" id="q7-a" value=0 required>
              <label for="q7-a">
                <p>Zootopie</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q7" id="q7-b" value=1 required>
              <label for="q7-b">
                <p>Némo</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q7" id="q7-c" value=0 required>
              <label for="q7-c">
                <p>Ralph 2.0</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <button type="submit" class="btn-quizz">Terminer</button>
      </form>
    </div>
  </main>
  <?php include '../../../config/includes/footer.php';?>
</body>

</html>