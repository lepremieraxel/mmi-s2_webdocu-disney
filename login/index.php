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
  <title>Connexion - Disney & Pixar</title>
</head>

<body>
  <?php
  include '../config/includes/menuToggle.php';
  include '../config/includes/header.php';
  ?>
  <div class="login-form form">
    <?php
    if (isset($_GET['login_err'])) {
      $err = htmlspecialchars($_GET['login_err']);

      switch ($err) {
        case 'password':
    ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Mot de passe incorrect. Réessayez ou <a href="../forgot/">Réinitialisez votre mot de passe</a>.</p>
          </div>
        <?php
          break;

        case 'email':
        ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Cette adresse email n'est reliée à aucun compte. Réessayez.</p>
          </div>
        <?php
          break;

        case 'already':
        ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Ce compte n'existe pas. Réessayez.</p>
          </div>
    <?php
          break;
      }
    }
    if (isset($_GET['reg_err'])) {
      $err = htmlspecialchars($_GET['reg_err']);

      switch ($err) {
        case 'success':
    ?>
          <div class="form-alert form-success">
            <h6>Succès</h6>
            <p>Inscription réussie ! Maintenant connectez vous.</p>
          </div>
        <?php
          break;
        }
    }
    if (isset($_GET['t'])){
      $url = $_GET['t'];
    }
    ?>
    <form action="login.php" method="post" class="no-menu">
      <h2>Connexion</h2>
      <input type="hidden" name="url" value="<?php echo $url;?>">
      <input class="login" type="email" name="email" placeholder="Email" required="required" autocomplete="off">
      <input class="login" type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
      <button type="submit">Connexion</button>
    </form>
    <div class="link-line">
      <a href="../register/">Pas encore inscrit ? Inscription.</a>
      <a href="../forgot/">Mot de passe oublié ?</a>
    </div>
  </div>
  <?php include '../config/includes/footer.php';?>
</body>

</html>