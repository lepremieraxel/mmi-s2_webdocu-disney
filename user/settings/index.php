<?php
session_start();
require_once '../../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../../login/index.php?t=settings');
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
  <link rel="stylesheet" href="../../src/css/form.css">
  <link rel="shortcut icon" href="../../src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
  <title>Paramètres - Disney & Pixar</title>
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
  <div class="btn-user">
    <a href="../"><i class="fa-solid fa-circle-user"></i></a>
    <a href="../config/unlog.php"><i class="fa-solid fa-power-off"></i></a>
  </div>
  <div class="settings-box">
    <h2>Les paramètres</h2>
    <div class="setting set-mobile">
      <h3>Réinitialiser le mot de passe</h3>
      <div class="recover-form">
        <?php
        if (isset($_GET['forg_err'])) {
          $err = htmlspecialchars($_GET['forg_err']);

          switch ($err) {
            case 'email':
        ?>
              <div class="form-alert form-error">
                <h6>Erreur</h6>
                <p>Veuillez vérifier l'email que vous avez indiqué.</p>
              </div>
            <?php
              break;

            case 'success':
            ?>
              <div class="form-alert form-success">
                <h6>Succès</h6>
                <p>Un email contenant le lien de réinitialisation viens de vous être envoyé.</p>
              </div>
        <?php
              break;
          }
        }
        ?>
        <form action="../../forgot/forgot.php" method="post" class="recover">
          <div class="recover-line">
            <input type="email" name="email" placeholder="Indiquez votre email ..." required autocomplete="off">
            <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
          </div>
        </form>
      </div>
    </div>
    <div class="setting">
      <h3>Mes messages envoyés</h3>
      <?php
      if (isset($_GET['del_err'])) {
        $err = htmlspecialchars($_GET['del_err']);

        switch ($err) {
          case 'success':
      ?>
            <div class="settings-alert form-success">
              <h6>Succès</h6>
              <p>Le message a bien été supprimé.</p>
            </div>
          <?php
            break;

          case 'already':
          ?>
            <div class="settings-alert form-error">
              <h6>Erreur</h6>
              <p>Ce message n'existe pas ou à déjà été supprimé.</p>
            </div>
      <?php
            break;
        }
      }
      ?>
      <div class="settings-msg-box">
        <?php include 'settings.php'; ?>
      </div>
    </div>
  </div>

  <?php include '../../config/includes/footer.php';?>
</body>

</html>