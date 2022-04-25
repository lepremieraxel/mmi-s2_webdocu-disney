<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer le mot de passe</title>
</head>
<body>
    <div class="recover-form">
        <?php
            if(isset($_GET['recov_err']))
            {
                $err = htmlspecialchars($_GET['recov_err']);

                switch($err)
                {
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
        <form action="password_change_post.php" method="post">
            <input type="hidden" name="token" value="<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>">
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="password" name="password_retype" placeholder="Re-tapez le mot de passe" required>
            <button type="submit">Modifier</button>
        </form>
        <p><a href="../login/">Connexion</a> / <a href="../register/">Inscription</a></p>
    </div>
</body>
</html>