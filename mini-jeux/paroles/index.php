<?php
session_start();
require_once '../../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../../login/index.php?t=paroles');
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
  <title>Termines les paroles - Disney & Pixar</title>
</head>

<body>
  <?php
  include '../../config/includes/menuToggle.php';
  include '../../config/includes/header.php';
  ?>
  <main>
    <h2>Termines les paroles</h2>
    <?php
    if (isset($_GET['lyrics_err'])) {
      $err = htmlspecialchars($_GET['lyrics_err']);

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
      <form action="lyrics.php" method="post">
        <div class="quizz-page" id="question1">
          <h3>Aladdin - Ce rêve bleu :<br>Ce rêve bleu, je n’y crois pas, c’est ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-a" value=1 required>
              <label for="q1-a">
                <p>merveilleux</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-b" value=0 required>
              <label for="q1-b">
                <p>mélodieux</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q1" id="q1-c" value=0 required>
              <label for="q1-c">
                <p>délicieux</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question2">
          <h3>Le Roi Lion - L’Amour brille sous les étoiles :<br>L’amour brille sous les étoiles, d’une étrange ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-a" value=0 required>
              <label for="q2-a">
                <p>lueur</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-b" value=1 required>
              <label for="q2-b">
                <p>lumière</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q2" id="q2-c" value=0 required>
              <label for="q2-c">
                <p>couleur</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question3">
          <h3>La Reine des Neiges - Je voudrais un bonhomme de neige :<br>Je voudrais un bonhomme de neige ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-a" value=0 required>
              <label for="q3-a">
                <p>qui cuisinera de bons petits plats</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-b" value=1 required>
              <label for="q3-b">
                <p>oh viens jouer avec moi</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q3" id="q3-c" value=0 required>
              <label for="q3-c">
                <p>pour danser dans mes bras</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question4">
          <h3>Vaiana - Le Bleu Lumière :<br>J’ai beau dire “Je reste, je n’partirai pas”, chacun de mes gestes ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-a" value=1 required>
              <label for="q4-a">
                <p>chacun de mes pas</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-b" value=0 required>
              <label for="q4-b">
                <p>me guide vers toi</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q4" id="q4-c" value=0 required>
              <label for="q4-c">
                <p>me pousse dans tes bras</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question5">
          <h3>Bambi - La chanson de la pluie :<br>Clap, clip, clap, petite pluie d’avril tombe ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-a" value=0 required>
              <label for="q5-a">
                <p>doucereusement</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-b" value=0 required>
              <label for="q5-b">
                <p>très délicatement</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q5" id="q5-c" value=1 required>
              <label for="q5-c">
                <p>en jolis diamants</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question6">
          <h3>Mary Poppins - Supercalifragilisticexpialidocious :<br>Supercalifragilisticexpialidocious ! C'est vrai que ce mot trop long est ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-a" value=0 required>
              <label for="q6-a">
                <p>dur de prononciation</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-b" value=0 required>
              <label for="q6-b">
                <p>complètement barbare</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q6" id="q6-c" value=1 required>
              <label for="q6-c">
                <p>parfaitement atroce</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question7">
          <h3>La Petite Sirène - Sous l’océan :<br>Sous l’océan, sous l’océan, doudou c’est ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q7" id="q7-a" value=0 required>
              <label for="q7-a">
                <p>tout doux</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q7" id="q7-b" value=0 required>
              <label for="q7-b">
                <p>mon ami</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q7" id="q7-c" value=1 required>
              <label for="q7-c">
                <p>bien mieux</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question8">
          <h3>Raiponce - Je veux y croire :<br>Tout ce temps, cachée dans mes pensées ; tout ce temps ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q8" id="q8-a" value=1 required>
              <label for="q8-a">
                <p>sans jamais y croire</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q8" id="q8-b" value=0 required>
              <label for="q8-b">
                <p>éloignée de tout</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q8" id="q8-c" value=0 required>
              <label for="q8-c">
                <p>isolée du monde</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question9">
          <h3>Aristochats - Les Aristochats :<br>Aristocats, ils sont toujours même quand ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q9" id="q9-a" value=1 required>
              <label for="q9-a">
                <p>ils font un petit tour</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q9" id="q9-b" value=0 required>
              <label for="q9-b">
                <p>ils jouent ensemble</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q9" id="q9-c" value=0 required>
              <label for="q9-c">
                <p>ils font des bêtises</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question10">
          <h3>Le livre de la jungle - Il en faut peu pour être heureux :<br>Il en faut peu pour être heureux, vraiment très peu pour être heureux, il faut se satisfaire du ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q10" id="q10-a" value=0 required>
              <label for="q10-a">
                <p>bonheur des autres</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q10" id="q10-b" value=0 required>
              <label for="q10-b">
                <p>minimum</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q10" id="q10-c" value=1 required>
              <label for="q10-c">
                <p>nécessaire</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question11">
          <h3>Pocahontas - L’air du vent :<br>Entends-tu le chant d'espoir du loup qui ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q11" id="q11-a" value=0 required>
              <label for="q11-a">
                <p>hurle à la lune ?</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q11" id="q11-b" value=0 required>
              <label for="q11-b">
                <p>résonne dans la forêt ?</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q11" id="q11-c" value=1 required>
              <label for="q11-c">
                <p>meurt d’amour ?</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="quizz-page" id="question12">
          <h3>Peter Pan - Tu t’envoles :<br>Rêve ta vie en couleurs, c’est le secret ...</h3>
          <div class="quizz-box">
            <div class="quizz-cell">
              <input type="radio" name="q12" id="q12-a" value=0 required>
              <label for="q12-a">
                <p>de la fortune</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q12" id="q12-b" value=0 required>
              <label for="q12-b">
                <p>du nirvana</p>
                <div class="quizz-check"></div>
              </label>
            </div>
            <div class="quizz-cell">
              <input type="radio" name="q12" id="q12-c" value=1 required>
              <label for="q12-c">
                <p>du bonheur</p>
                <div class="quizz-check"></div>
              </label>
            </div>
          </div>
        </div>
        <button type="submit" class="btn-quizz">Terminer</button>
      </form>
    </div>
  </main>
  <?php include '../../config/includes/footer.php';?>
</body>

</html>