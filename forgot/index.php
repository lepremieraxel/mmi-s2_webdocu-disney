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
  <title>Mot de passe oublié - Disney & Pixar</title>
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
  <div class="recover-form form">
    <?php
    if (isset($_GET['forg_err'])) {
      $err = htmlspecialchars($_GET['forg_err']);

      switch ($err) {
        case 'email':
    ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Aucun compte n'existe avec cette adresse email. <a href="../register/">Inscrivez vous</a> ou <a href="../login/">connectez vous</a>.</p>
          </div>
    <?php
          break;
      }
    }
    ?>
    <form action="forgot.php" method="post" class="no-menu">
      <h2>Mot de passe oublié</h2>
      <p>Indiquez votre adresse email pour recevoir le lien de réinitialisation de votre mot de passe.</p>
      <input class="login" type="email" name="email" placeholder="Email" required autocomplete="off">
      <button type="submit">Envoyer</button>
    </form>
  </div>
  <?php include '../config/includes/footer.php';?>
</body>

</html>