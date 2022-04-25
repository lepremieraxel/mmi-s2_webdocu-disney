<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
</head>
<body>
    <div class="recover-form">
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
        <form action="forgot.php" method="post">
            <input type="email" name="email" placeholder="Email" required autocomplete="off">
            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>