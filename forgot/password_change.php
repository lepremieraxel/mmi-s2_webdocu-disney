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
  <title>Réinitialisation du mot de passe - Disney & Pixar</title>
</head>

<body>
  <div class="menuToggle">
    <input type="checkbox" />
    <span></span>
    <span></span>
    <span></span>
    <ul class="menu">
      <li><a href="../"><i class="fa-solid fa-house"></i> Accueil</a></li>
      <li><a href="../mini-jeux/"><i class="fa-solid fa-chess"></i> Les mini-jeux</a></li>
      <li><a href="../forum/"><i class="fa-solid fa-message"></i> Forum</a></li>
      <li><a href="../about/"><i class="fa-solid fa-users"></i> à propos</a></li>
    </ul>
  </div>
  <a href="../user/" class="user-mobile"><i class="fa-solid fa-circle-user"></i></a>
  <header>
    <a href="../"><img src="../src/img/disneyPixar.png" alt="disney et pixar"></a>
    <nav>
      <a href="../"><i class="fa-solid fa-house"></i> Accueil</a>
      <a href="../mini-jeux/"><i class="fa-solid fa-chess"></i> Les mini-jeux</a>
      <a href="../forum/"><i class="fa-solid fa-message"></i> Forum</a>
      <a href="../about/"><i class="fa-solid fa-users"></i> à propos</a>
    </nav>
    <a href="../user/" class="user"><i class="fa-solid fa-circle-user"></i></a>
  </header>
  <div class="recover-form form">
    <?php
    if (isset($_GET['recov_err'])) {
      $err = htmlspecialchars($_GET['recov_err']);

      switch ($err) {
        case 'password':
    ?>
          <div class="form-alert form-error">
            <h6>Erreur</h6>
            <p>Les mots de passe ne correspondent pas. Réessayez.</p>
          </div>
        <?php
          break;

        case 'success':
        ?>
          <div class="form-alert form-success">
            <h6>Succès</h6>
            <p>Le mot de passe a bien été modifié. Veuillez vous <a href="../login/">connectez</a>.</p>
          </div>
    <?php
          break;
      }
    }
    ?>
    <form action="password_change_post.php" method="post" class="no-menu">
      <h2>Réinitialisation du mot de passe</h2>
      <input type="hidden" name="token" value="<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>">
      <input class="login" type="password" name="password" placeholder="Mot de passe" required>
      <input class="login" type="password" name="password_retype" placeholder="Re-tapez le mot de passe" required>
      <button type="submit">Modifier</button>
    </form>
    <div class="link-line">
      <a href="../login/">Connexion</a>
      <a href="../register/">Inscription</a>
    </div>
  </div>
</body>

</html>