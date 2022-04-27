<?php
    session_start();
    require_once '../../../config/config.php';
    if(!isset($_SESSION['user'])){
        header('Location:../../../login/');
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
    <link rel="stylesheet" href="../../../src/css/style.css">
    <link rel="stylesheet" href="../../../src/css/games.css">
    <link rel="shortcut icon" href="../../../src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
    <title>Les personnages - Disney & Pixar</title>
</head>
<body>
    <div class="menuToggle">
        <input type="checkbox"/>
        <span></span>
        <span></span>
        <span></span>
        <ul class="menu">
            <li><a href="../../../"><i class="fa-solid fa-house"></i> Accueil</a></li>
            <li><a href="../../../mini-jeux/"><i class="fa-solid fa-chess"></i> Les mini-jeux</a></li>
            <li><a href="../../../forum/"><i class="fa-solid fa-message"></i> Forum</a></li>
            <li><a href="../../../about/"><i class="fa-solid fa-users"></i> à propos</a></li>
        </ul>
    </div>
    <a href="../../../user/" class="user-mobile"><i class="fa-solid fa-circle-user"></i></a>
    <header>
        <a href="../../../"><img src="../../../src/img/disneyPixar.png" alt="disney et pixar"></a>
        <nav>
            <a href="../../../"><i class="fa-solid fa-house"></i> Accueil</a>
            <a href="../../../mini-jeux/"><i class="fa-solid fa-chess"></i> Les mini-jeux</a>
            <a href="../../../forum/"><i class="fa-solid fa-message"></i> Forum</a>
            <a href="../../../about/"><i class="fa-solid fa-users"></i> à propos</a>
        </nav>
        <a href="../../../user/" class="user"><i class="fa-solid fa-circle-user"></i></a>
    </header>
    <main>
        <h2>Les personnages</h2>
        <?php
            if(isset($_GET['sondage_err']))
            {
                $err = htmlspecialchars($_GET['sondage_err']);

                switch($err)
                {
                    case 'empty':
                    ?>
                        <div class="form-alert form-error">
                            <h6>Erreur</h6>
                            <p>Veuillez choisir un personnage dans chaque ligne.</p>
                        </div>
                    <?php
                    break;

                    case 'update':
                    ?>
                        <div class="form-alert form-success">
                            <h6>Succès</h6>
                            <p>Vos anciens choix ont été mis à jour.</p>
                        </div>
                    <?php
                    break;

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
        <form action="sondages.php" method="post" class="sondages-box">
            <div class="sondages-page" id="page1">
                <h3>Quelle est ton personnage préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice1">
                        <input type="radio" name="s1" id="s-choice1" class="sondages-choix sondages-left" value="olaf" required>
                        <p>Olaf</p>
                        <img src="../../../src/img/olaf.jpg" alt="Olaf">
                    </label>
                    <label for="s-choice2">
                        <input type="radio" name="s1" id="s-choice2" class="sondages-choix sondages-left" value="stitch" required>
                        <p>Stitch</p>
                        <img src="../../../src/img/stitch.jpg" alt="Stitch">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page2">
                <h3>Quelle est ton personnage préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice3">
                        <input type="radio" name="s2" id="s-choice3" class="sondages-choix sondages-left" value="mr-incredible" required>
                        <p>Mr. Incredible</p>
                        <img src="../../../src/img/mr-incredible.jpg" alt="Mr Incredible">
                    </label>
                    <label for="s-choice4">
                        <input type="radio" name="s2" id="s-choice4" class="sondages-choix sondages-left" value="baymax" required>
                        <p>Baymax</p>
                        <img src="../../../src/img/baymax.jpg" alt="Baymax">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page3">
                <h3>Quelle est ton personnage préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice5">
                        <input type="radio" name="s3" id="s-choice5" class="sondages-choix sondages-left" value="simba" required>
                        <p>Simba</p>
                        <img src="../../../src/img/simba.png" alt="Simba">
                    </label>
                    <label for="s-choice6">
                        <input type="radio" name="s3" id="s-choice6" class="sondages-choix sondages-left" value="wall-e" required>
                        <p>Wall-e</p>
                        <img src="../../../src/img/wall-e.jpg" alt="Wall-e">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page4">
                <h3>Quelle est ton personnage préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice7">
                        <input type="radio" name="s4" id="s-choice7" class="sondages-choix sondages-left" value="bambi" required>
                        <p>Bambi</p>
                        <img src="../../../src/img/bambi.jpg" alt="Bambi">
                    </label>
                    <label for="s-choice8">
                        <input type="radio" name="s4" id="s-choice8" class="sondages-choix sondages-left" value="dumbo" required>
                        <p>Dumbo</p>
                        <img src="../../../src/img/dumbo.jpg" alt="Dumbo">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page5">
                <h3>Quelle est ton personnage préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice9">
                        <input type="radio" name="s5" id="s-choice9" class="sondages-choix sondages-left" value="winnie" required>
                        <p>Winnie</p>
                        <img src="../../../src/img/winnie.jpg" alt="Winnie">
                    </label>
                    <label for="s-choice10">
                        <input type="radio" name="s5" id="s-choice10" class="sondages-choix sondages-left" value="dingo" required>
                        <p>Dingo</p>
                        <img src="../../../src/img/dingo.jpg" alt="Dingo">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page6">
                <h3>Quelle est ton personnage préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice11">
                        <input type="radio" name="S6" id="s-choice11" class="sondages-choix sondages-left" value="tarzan" required>
                        <p>Tarzan</p>
                        <img src="../../../src/img/tarzan.jpg" alt="Tarzan">
                    </label>
                    <label for="s-choice12">
                        <input type="radio" name="s6" id="s-choice12" class="sondages-choix sondages-left" value="hercule" required>
                        <p>Hercule</p>
                        <img src="../../../src/img/hercule.jpg" alt="Hercule">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page7">
                <h3>Quelle est ton personnage préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice13">
                        <input type="radio" name="s7" id="s-choice13" class="sondages-choix sondages-left" value="buzz" required>
                        <p>Buzz L'éclair</p>
                        <img src="../../../src/img/buzz.jpg" alt="Buzz L'éclair">
                    </label>
                    <label for="s-choice14">
                        <input type="radio" name="s7" id="s-choice14" class="sondages-choix sondages-left" value="bob" required>
                        <p>Bob Razowski</p>
                        <img src="../../../src/img/bob-razowski.jpg" alt="Bob Razowski">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page8">
                <h3>Quelle est ton personnage préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice15">
                        <input type="radio" name="s8" id="s-choice15" class="sondages-choix sondages-left" value="duchesse" required>
                        <p>Duchesse</p>
                        <img src="../../../src/img/duchesse.jpg" alt="Duchesse">
                    </label>
                    <label for="s-choice16">
                        <input type="radio" name="s8" id="s-choice16" class="sondages-choix sondages-left" value="lady" required>
                        <p>Lady</p>
                        <img src="../../../src/img/lady.jpg" alt="Lady">
                    </label>
                </div>
            </div>
            <div class="sondage-button-line">
                <button type="submit">Valider</button>
            </div>
        </form>
    </main>
</body>
</html>