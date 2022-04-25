<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <div class="login-form">
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
                            <p>Inscription réussie ! Maintenant <a href="../login/">connectez vous</a>.</p>
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
                            <p>Vous avez déja un compte. <a href="../login/">Connectez vous</a> ou <a href="../forgot/">réinitialisez le mot de passe</a>.</p>
                        </div>
                    <?php
                    break;
                }
            }
        ?>
        <form action="register.php" method="post">
            <h2>Inscription</h2>
            <input type="text" name="pseudo" placeholder="Pseudo" required="required" autocomplete="off">
            <input type="email" name="email" placeholder="Email" required="required" autocomplete="off">
            <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
            <input type="password" name="password_retype" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
            <button type="submit">Inscription</button>
        </form>
        <a href="../login/">Connexion</a>
    </div>
</body>
</html>