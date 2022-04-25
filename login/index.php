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
    <div class="menuToggle">
        <input type="checkbox"/>
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
    <div class="login-form form">
        <?php
            if(isset($_GET['login_err']))
            {
                $err = htmlspecialchars($_GET['login_err']);

                switch($err)
                {
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
        ?>
        <form action="login.php" method="post" class="no-menu">
            <h2>Connexion</h2>
            <input class="login" type="email" name="email" placeholder="Email" required="required" autocomplete="off">
            <input class="login" type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
            <button type="submit">Connexion</button>
        </form>
        <div class="link-line">
            <a href="../register/">Pas encore inscrit ? Inscription.</a>
            <a href="../forgot/">Mot de passe oublié ?</a>
        </div>
    </div>
</body>
</html>