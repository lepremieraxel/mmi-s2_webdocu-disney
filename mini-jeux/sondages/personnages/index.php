<?php
session_start();
require_once '../../../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../../../login/index.php?t=sondages/personnages');
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
  <title>Les personnages - Disney & Pixar</title>
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
    <h2>Les personnages</h2>
    <?php
    if (isset($_GET['sondage_err'])) {
      $err = htmlspecialchars($_GET['sondage_err']);

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
            <p>Vous avez déjà répondu à ce sondage.</p>
          </div>
    <?php
          break;
      }
    }
    ?>
    <div class="sondages-container">
      <form action="sondages.php" method="post">
        <div class="sondage-page active" id="page1">
          <h3>Quelle est ton personnage préféré entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s1-l">
                <img src="../../../src/img/personnages/olaf.png" alt="Olaf">
              </label>
              <input type="radio" name="s1" id="s1-l" value="Olaf" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s1-r">
                <img src="../../../src/img/personnages/stitch.png" alt="Stitch">
              </label>
              <input type="radio" name="s1" id="s1-r" value="Stitch" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page2">
          <h3>Quelle est ton personnage préféré entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s2-l">
                <img src="../../../src/img/personnages/mr-incredible.png" alt="Mr Incredible">
              </label>
              <input type="radio" name="s2" id="s2-l" value="Mr Incredible" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s2-r">
                <img src="../../../src/img/personnages/baymax.png" alt="Baymax">
              </label>
              <input type="radio" name="s2" id="s2-r" value="Baymax" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page3">
          <h3>Quelle est ton personnage préféré entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s3-l">
                <img src="../../../src/img/personnages/simba.png" alt="Simba">
              </label>
              <input type="radio" name="s3" id="s3-l" value="Simba" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s3-r">
                <img src="../../../src/img/personnages/wall-e.png" alt="Wall-e">
              </label>
              <input type="radio" name="s3" id="s3-r" value="Wall-e" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page4">
          <h3>Quelle est ton personnage préféré entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s4-l">
                <img src="../../../src/img/personnages/bambi.png" alt="Bambi">
              </label>
              <input type="radio" name="s4" id="s4-l" value="Bambi" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s4-r">
                <img src="../../../src/img/personnages/dumbo.png" alt="Dumbo">
              </label>
              <input type="radio" name="s4" id="s4-r" value="Dumbo" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page5">
          <h3>Quelle est ton personnage préféré entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s5-l">
                <img src="../../../src/img/personnages/winnie.png" alt="Winnie">
              </label>
              <input type="radio" name="s5" id="s5-l" value="Winnie" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s5-r">
                <img src="../../../src/img/personnages/dingo.png" alt="Dingo">
              </label>
              <input type="radio" name="s5" id="s5-r" value="Dingo" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page6">
          <h3>Quelle est ton personnage préféré entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s6-l">
                <img src="../../../src/img/personnages/tarzan.png" alt="Tarzan">
              </label>
              <input type="radio" name="s6" id="s6-l" value="Tarzan" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s6-r">
                <img src="../../../src/img/personnages/hercule.png" alt="Hercule">
              </label>
              <input type="radio" name="s6" id="s6-r" value="Hercule" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page7">
          <h3>Quelle est ton personnage préféré entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s7-l">
                <img src="../../../src/img/personnages/buzz.png" alt="Buzz L'éclair">
              </label>
              <input type="radio" name="s7" id="s7-l" value="Buzz L'éclair" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s7-r">
                <img src="../../../src/img/personnages/bob.png" alt="Bob Razowski">
              </label>
              <input type="radio" name="s7" id="s7-r" value="Bob Razowski" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page8">
          <h3>Quelle est ton personnage préféré entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s8-l">
                <img src="../../../src/img/personnages/duchesse.png" alt="Duchesse">
              </label>
              <input type="radio" name="s8" id="s8-l" value="Duchesse" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s8-r">
                <img src="../../../src/img/personnages/lady.png" alt="Lady">
              </label>
              <input type="radio" name="s8" id="s8-r" value="Lady" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btn-sondage" type="submit">Terminer</button>
          </div>
        </div>
      </form>
    </div>
  </main>
  <script src="../../../src/js/sondages.js"></script>
  <?php include '../../../config/includes/footer.php';?>
</body>

</html>