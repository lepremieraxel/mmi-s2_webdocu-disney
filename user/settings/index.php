<?php
    session_start();
    require_once '../../config/config.php';
    if(!isset($_SESSION['user'])){
        header('Location:../../login/');
        die();
    }
    $req = $bdd->prepare('SELECT * FROM users WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e0b8ba43a6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../src/css/style.css">
    <link rel="stylesheet" href="../../src/css/form.css">
    <link rel="shortcut icon" href="../../src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
    <title>Paramètres - Disney & Pixar</title>
</head>
<body>
    <div class="menuToggle">
        <input type="checkbox"/>
        <span></span>
        <span></span>
        <span></span>
        <ul class="menu">
            <li><a href="../../"><i class="fa-solid fa-house"></i> Accueil</a></li>
            <li><a href="../../mini-jeux/"><i class="fa-solid fa-chess"></i> Les mini-jeux</a></li>
            <li><a href="../../forum/"><i class="fa-solid fa-message"></i> Forum</a></li>
            <li><a href="../../about/"><i class="fa-solid fa-users"></i> à propos</a></li>
        </ul>
    </div>
    <a class="unlog-mobile" href="../../config/unlog.php"><i class="fa-solid fa-power-off"></i></a>
    <a href="../" class="user-mobile"><i class="fa-solid fa-circle-user"></i></a>
    <header>
        <a href="../../"><img src="../../src/img/disneyPixar.png" alt="disney et pixar"></a>
        <nav>
            <a href="../../"><i class="fa-solid fa-house"></i> Accueil</a>
            <a href="../../mini-jeux/"><i class="fa-solid fa-chess"></i> Les mini-jeux</a>
            <a href="../../forum/"><i class="fa-solid fa-message"></i> Forum</a>
            <a href="../../about/"><i class="fa-solid fa-users"></i> à propos</a>
        </nav>
        <a href="../" class="user"><i class="fa-solid fa-circle-user"></i></a>
    </header>
    <a class="unlog" href="../../config/unlog.php"><i class="fa-solid fa-power-off"></i></a>
    <div class="settings-box">
        <h2>Les paramètres</h2>
        <div class="setting set-mobile">
            <h3>Réinitialiser le mot de passe</h3>
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
                                    <p>Aucun compte n'existe avec cette adresse email. <a href="../../register/">Inscrivez vous</a> ou <a href="../../login/">connectez vous</a>.</p>
                                </div>
                            <?php
                            break;
                        }
                    }
                ?>
                <form action="../../forgot/forgot.php" method="post" class="recover">
                    <div class="recover-line">
                        <input type="email" name="email" placeholder="Indiquez votre email ..." required autocomplete="off">
                        <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="setting">
            <h3>Mes messages envoyés</h3>
            <?php
                if(isset($_GET['del_err']))
                {
                    $err = htmlspecialchars($_GET['del_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="settings-alert form-success">
                                <h6>Succès</h6>
                                <p>Le message a bien été supprimé.</p>
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="settings-alert form-error">
                                <h6>Erreur</h6>
                                <p>Ce message n'existe pas ou à déjà été supprimé.</p>
                            </div>
                        <?php
                        break;
                    }
                }
            ?>
            <div class="settings-msg-box">
                <?php include 'settings.php';?>
            </div>
        </div>
    </div>
    
</body>
</html>