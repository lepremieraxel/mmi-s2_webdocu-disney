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
            if(isset($_GET['reg_err']))
            {
                $err = htmlspecialchars($_GET['reg_err']);

                switch($err)
                {
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
</body>
</html>