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
    <link rel="stylesheet" href="../../src/css/games.css">
    <link rel="shortcut icon" href="../../src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
    <title>Les sondages - Disney & Pixar</title>
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
    <a href="../../user/" class="user-mobile"><i class="fa-solid fa-circle-user"></i></a>
    <header>
        <a href="../../"><img src="../../src/img/disneyPixar.png" alt="disney et pixar"></a>
        <nav>
            <a href="../../"><i class="fa-solid fa-house"></i> Accueil</a>
            <a href="../../mini-jeux/"><i class="fa-solid fa-chess"></i> Les mini-jeux</a>
            <a href="../../forum/"><i class="fa-solid fa-message"></i> Forum</a>
            <a href="../../about/"><i class="fa-solid fa-users"></i> à propos</a>
        </nav>
        <a href="../../user/" class="user"><i class="fa-solid fa-circle-user"></i></a>
    </header>
    <main>
        <h2>Les sondages</h2>
        <?php
            if(isset($_GET['game_err']))
            {
                $err = htmlspecialchars($_GET['game_err']);

                switch($err)
                {
                    case 'success':
                    ?>
                        <div class="form-alert form-success">
                            <h6>Succès</h6>
                            <p>Vos choix ont bien été enregistré.</p>
                        </div>
                    <?php
                    break;
                }
            }
        ?>
        <div class="games-box">
            <a href="princess/" id="princess" class="games">
                <h3>Les princesses</h3>
                <i class="fa-solid fa-crown"></i>
            </a>
            <a href="personnages/" id="personnages" class="games">
                <h3>Les personnages</h3>
                <i class="fa-solid fa-person"></i>
            </a>
            <a href="movies/" id="movies" class="games">
                <h3>Les films</h3>
                <i class="fa-solid fa-film"></i>
            </a>
        </div>
    </main>
</body>
</html>