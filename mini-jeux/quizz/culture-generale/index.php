<?php
session_start();
require_once '../../../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../../../login/index.php?t=quizz/culture-generale');
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
  <title>Culture Disney - Disney & Pixar</title>
</head>

<body>
  <?php
  include '../../../config/includes/menuToggle.php';
  include '../../../config/includes/header.php';
  ?>
  <main>
    <h2>Culture Disney</h2>
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
          <h3>Pourquoi Walt Disney a-t-il choisi Mickey Mouse comme mascotte ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-a" value=0 required>
              <label for="q1-a">
                <p>Car il adorait les souris</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-b" value=1 required>
              <label for="q1-b">
                <p>Car il en avait peur</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-c" value=0 required>
              <label for="q1-c">
                <p>Car c’est un animal facile à dessiner</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question2">
          <h3>En quelle année The Walt Disney Studios ont-ils racheté le studio Pixar ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-a" value=0 required>
              <label for="q2-a">
                <p>2001</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-b" value=0 required>
              <label for="q2-b">
                <p>2003</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-c" value=1 required>
              <label for="q2-c">
                <p>2006</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question3">
          <h3>Quel était le nom initialement donné à Mickey Mouse ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-a" value=1 required>
              <label for="q3-a">
                <p>Mortimer Mouse</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-b" value=0 required>
              <label for="q3-b">
                <p>Beny Mouse</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-c" value=0 required>
              <label for="q3-c">
                <p>Nuts Mouse</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question4">
          <h3>Quel est le tout premier long-métrage de Disney ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-a" value=1 required>
              <label for="q4-a">
                <p>Blanche Neige et les sept nains</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-b" value=0 required>
              <label for="q4-b">
                <p>Pinocchio</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-c" value=0 required>
              <label for="q4-c">
                <p>Fantasia</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question5">
          <h3>En quelle année a été créé The Walt Disney Company ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-a" value=1 required>
              <label for="q5-a">
                <p>1923</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-b" value=0 required>
              <label for="q5-b">
                <p>1931</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-c" value=0 required>
              <label for="q5-c">
                <p>1938</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question6">
          <h3>Quel est le premier nom à l’entreprise The Walt Disney Company ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-a" value=0 required>
              <label for="q6-a">
                <p>Mickey Mouse Studio</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-b" value=1 required>
              <label for="q6-b">
                <p>Disney Brothers Studio</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-c" value=0 required>
              <label for="q6-c">
                <p>Elle n’a jamais changé de nom</p>
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