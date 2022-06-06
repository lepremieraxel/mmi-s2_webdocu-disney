<?php
session_start();
require_once '../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../login/index.php?t=forum');
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
  <link rel="stylesheet" href="../src/css/form.css">
  <link rel="shortcut icon" href="../src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
  <title>Forum - Disney & Pixar</title>
</head>

<body>
  <?php
  include '../config/includes/menuToggle.php';
  include '../config/includes/header.php';
  ?>
  <h2 class="h2-forum">Le forum</h2>
  <div class="forum-form">
    <?php
    if (isset($_GET['forum_err'])) {
      $err = htmlspecialchars($_GET['forum_err']);

      switch ($err) {
        case 'length':
    ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Votre message est trop long.</p>
          </div>
        <?php
          break;

        case 'empty':
        ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Veuillez remplir le champ message.</p>
          </div>
    <?php
          break;
      }
    }
    ?>
    <form action="forum.php" method="post" class="forum">
      <div class="forum-box">
        <textarea id="message" name="message" placeholder="Écrivez votre message ..." required="required" autocomplete="off" maxlength="350"></textarea>
        <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
      </div>
    </form>
  </div>

  <div class="message-box">
    <?php include 'affichage.php'; ?>
  </div>

  <script>
    const tx = document.getElementsByTagName("textarea");
    for (let i = 0; i < tx.length; i++) {
      tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
      tx[i].addEventListener("input", OnInput, false);
    }

    function OnInput() {
      this.style.height = "auto";
      this.style.height = (this.scrollHeight) + "px";
    }
  </script>
  <?php include '../config/includes/footer.php';?>
</body>

</html>