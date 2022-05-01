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
  <title>Les princesses - Disney & Pixar</title>
</head>

<body>
  <?php
  include '../../../config/includes/menuToggle.php';
  include '../../../config/includes/header.php';
  ?>
  <main>
    <h2>Les princesses</h2>
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
          <h3>Quelle est ta princesse préférée entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s1-l">
                <img src="../../../src/img/elsa.jpg" alt="Elsa">
              </label>
              <input type="radio" name="s1" id="s1-l" value="Elsa" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s1-r">
                <img src="../../../src/img/vaiana.jpg" alt="Vaiana">
              </label>
              <input type="radio" name="s1" id="s1-r" value="Vaiana" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page2">
          <h3>Quelle est ta princesse préférée entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s2-l">
                <img src="../../../src/img/mulan.jpg" alt="Mulan">
              </label>
              <input type="radio" name="s2" id="s2-l" value="Mulan" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s2-r">
                <img src="../../../src/img/pocahontas.jpg" alt="Pocahontas">
              </label>
              <input type="radio" name="s2" id="s2-r" value="Pocahontas" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page3">
          <h3>Quelle est ta princesse préférée entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s3-l">
                <img src="../../../src/img/tiana.jpg" alt="Tiana">
              </label>
              <input type="radio" name="s3" id="s3-l" value="Tiana" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s3-r">
                <img src="../../../src/img/ariel.jpg" alt="Ariel">
              </label>
              <input type="radio" name="s3" id="s3-r" value="Ariel" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page4">
          <h3>Quelle est ta princesse préférée entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s4-l">
                <img src="../../../src/img/raiponce.jpg" alt="Raiponce">
              </label>
              <input type="radio" name="s4" id="s4-l" value="Raiponce" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s4-r">
                <img src="../../../src/img/merida.jpg" alt="Mérida">
              </label>
              <input type="radio" name="s4" id="s4-r" value="Mérida" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page5">
          <h3>Quelle est ta princesse préférée entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s5-l">
                <img src="../../../src/img/belle.jpg" alt="Belle">
              </label>
              <input type="radio" name="s5" id="s5-l" value="Belle" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s5-r">
                <img src="../../../src/img/aurore.jpg" alt="Aurore">
              </label>
              <input type="radio" name="s5" id="s5-r" value="Aurore" required>
              <div class="sondage-check"></div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btnPrev btn-sondage" type="button">Précédent</button>
            <button class="btnNext btn-sondage" type="button">Suivant</button>
          </div>
        </div>
        <div class="sondage-page" id="page6">
          <h3>Quelle est ta princesse préférée entre :</h3>
          <div class="sondage-box">
            <div class="sondage-cell">
              <label for="s6-l">
                <img src="../../../src/img/blanche-neige.jpg" alt="Blanche Neige">
              </label>
              <input type="radio" name="s6" id="s6-l" value="Blanche Neige" required>
              <div class="sondage-check"></div>
            </div>
            <div class="sondage-cell">
              <label for="s6-r">
                <img src="../../../src/img/cendrillon.jpg" alt="Cendrillon">
              </label>
              <input type="radio" name="s6" id="s6-r" value="Cendrillon" required>
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
</body>

</html>