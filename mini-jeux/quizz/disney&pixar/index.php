<?php
session_start();
require_once '../../../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../../../login/index.php?t=quizz/disney&pixar');
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
  include '../../../config/includes/menuToggle.php';
  include '../../../config/includes/header.php';
  ?>
  <main>
    <h2>Disney & Pixar</h2>
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
        <div class="quizz-page" id="question2">
          <h3>Comment s’appelle le caméléon dans Raiponce ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-a" value=0 required>
              <label for="q2-a">
                <p>Léon</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-b" value=1 required>
              <label for="q2-b">
                <p>Pascal</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-c" value=0 required>
              <label for="q2-c">
                <p>Jérôme</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question3">
          <h3>Quel est le prénom de la princesse dans Rebelle ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-a" value=0 required>
              <label for="q3-a">
                <p>Irina</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-b" value=1 required>
              <label for="q3-b">
                <p>Mérida</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-c" value=0 required>
              <label for="q3-c">
                <p>Sofia</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question4">
          <h3>Quelle émotion est représentée par un personnage vert dans Vice Versa ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-a" value=1 required>
              <label for="q4-a">
                <p>Dégoût</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-b" value=0 required>
              <label for="q4-b">
                <p>Tristesse</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-c" value=0 required>
              <label for="q4-c">
                <p>Peur</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question5">
          <h3>Comment s’appelle la créature dans Les Nouveaux Héros ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-a" value=0 required>
              <label for="q5-a">
                <p>Wasabi</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-b" value=0 required>
              <label for="q5-b">
                <p>Hiro</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-c" value=1 required>
              <label for="q5-c">
                <p>Baymax</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question6">
          <h3>Quel animal porte le nom de Flash dans Zootopie ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-a" value=1 required>
              <label for="q6-a">
                <p>Un paresseux</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-b" value=0 required>
              <label for="q6-b">
                <p>Un guépard</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-c" value=0 required>
              <label for="q6-c">
                <p>Un buffle</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question7">
          <h3>Comment s’appelle le chien dans Mickey Mouse ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q7" id="q7-a" value=0 required>
              <label for="q7-a">
                <p>Pat</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q7" id="q7-b" value=1 required>
              <label for="q7-b">
                <p>Pluto</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q7" id="q7-c" value=0 required>
              <label for="q7-c">
                <p>Balthazar</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question8">
          <h3>Où se déroulent Les aventures de Bernard et Bianca ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q8" id="q8-a" value=0 required>
              <label for="q8-a">
                <p>Casablanca</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q8" id="q8-b" value=1 required>
              <label for="q8-b">
                <p>New York</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q8" id="q8-c" value=0 required>
              <label for="q8-c">
                <p>Moscou</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question9">
          <h3>Quel animal est le surnom du jeune Arthur dans Merlin l’enchanteur ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q9" id="q9-a" value=1 required>
              <label for="q9-a">
                <p>Moustique</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q9" id="q9-b" value=0 required>
              <label for="q9-b">
                <p>Grenouille</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q9" id="q9-c" value=0 required>
              <label for="q9-c">
                <p>Lapin</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question10">
          <h3>Au début de l’histoire, quel animal découvre le renardeau dans Rox et Rouky ?</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q10" id="q10-a" value=0 required>
              <label for="q10-a">
                <p>Un chien</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q10" id="q10-b" value=1 required>
              <label for="q10-b">
                <p>Une chouette</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q10" id="q10-c" value=0 required>
              <label for="q10-c">
                <p>Un chat</p>
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