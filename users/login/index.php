<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <div class="login-form">
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
        <form action="login.php" method="post">
            <h2>Connexion</h2>
            <input type="email" name="email" placeholder="Email" required="required" autocomplete="off">
            <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
            <button type="submit">Connexion</button>
        </form>
        <a href="../forgot/">Mot de passe oublié ?</a>
        <a href="../register/">Pas encore inscrit ? Inscription.</a>
    </div>
</body>
</html>