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
            if(isset($_GET['forg_err']))
            {
                $err = htmlspecialchars($_GET['forg_err']);

                switch($err)
                {
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
</body>
</html>