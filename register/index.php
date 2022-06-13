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
  <title>Inscription - Disney & Pixar</title>
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
  include '../config/includes/menuToggle.php';
  include '../config/includes/header.php';
  ?>
  <div class="login-form form">
    <?php
    if (isset($_GET['reg_err'])) {
      $err = htmlspecialchars($_GET['reg_err']);

      switch ($err) {
        case 'success':
    ?>
          <div class="form-alert form-success">
            <h6>Succès</h6>
            <p>Inscription réussie ! Maintenant&ensp;<a href="../login/">connectez vous</a>.</p>
          </div>
        <?php
          break;

        case 'password':
        ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Les mots de passe de correspondent pas. Réessayez.</p>
          </div>
        <?php
          break;

        case 'email':
        ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Veuillez rentrer une adresse email valide.</p>
          </div>
        <?php
          break;

        case 'email_length':
        ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Email trop long. Veuillez rentrer un email plus court.</p>
          </div>
        <?php
          break;

        case 'pseudo_length':
        ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Pseudo trop long. Veuillez rentrer un pseudo plus court.</p>
          </div>
        <?php
          break;

        case 'already':
        ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Vous avez déja un compte.&nbsp;<a href="../login/">Connectez vous</a>&nbsp;ou&nbsp;<a href="../forgot/">réinitialisez le mot de passe.</a></p>
          </div>
    <?php
          break;
      }
    }
    ?>
    <form action="register.php" method="post" class="no-menu">
      <h2>Inscription</h2>
      <input class="login" type="text" name="pseudo" placeholder="Pseudo" required="required" autocomplete="off">
      <input class="login" type="email" name="email" placeholder="Email" required="required" autocomplete="off">
      <div class="input-line">
        <input class="login-line" type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
        <input class="login-line" type="password" name="password_retype" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
      </div>
      <button type="submit">Inscription</button>
    </form>
    <div class="link-line">
      <a href="../login/">Vous avez déjà un compte ? Connexion.</a>
    </div>
  </div>
  <?php include '../config/includes/footer.php';?>
</body>

</html>