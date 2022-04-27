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
    <title>Les princesses - Disney & Pixar</title>
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
        <h2>Les princesses</h2>
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
                            <p>Veuillez choisir une princesse dans chaque ligne.</p>
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
                <h3>Quelle est ta princesse préférée entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice1">
                        <input type="radio" name="s1" id="s-choice1" class="sondages-choix sondages-left" value="elsa" required>
                        <p>Elsa</p>
                        <img src="../../../src/img/elsa.jpg" alt="La reine des neiges">
                    </label>
                    <label for="s-choice2">
                        <input type="radio" name="s1" id="s-choice2" class="sondages-choix sondages-left" value="vaiana" required>
                        <p>Vaïana</p>
                        <img src="../../../src/img/vaiana.jpg" alt="Vaiana">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page2">
                <h3>Quelle est ta princesse préférée entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice3">
                        <input type="radio" name="s2" id="s-choice3" class="sondages-choix sondages-left" value="mulan" required>
                        <p>Mulan</p>
                        <img src="../../../src/img/mulan.jpg" alt="Mulan">
                    </label>
                    <label for="s-choice4">
                        <input type="radio" name="s2" id="s-choice4" class="sondages-choix sondages-left" value="pocahontas" required>
                        <p>Pocahontas</p>
                        <img src="../../../src/img/pocahontas.jpg" alt="Pocahontas">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page3">
                <h3>Quelle est ta princesse préférée entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice5">
                        <input type="radio" name="s3" id="s-choice5" class="sondages-choix sondages-left" value="tiana" required>
                        <p>Tiana</p>
                        <img src="../../../src/img/tiana.jpg" alt="Tiana">
                    </label>
                    <label for="s-choice6">
                        <input type="radio" name="s3" id="s-choice6" class="sondages-choix sondages-left" value="ariel" required>
                        <p>Ariel</p>
                        <img src="../../../src/img/ariel.jpg" alt="Ariel">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page4">
                <h3>Quelle est ta princesse préférée entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice7">
                        <input type="radio" name="s4" id="s-choice7" class="sondages-choix sondages-left" value="raiponce" required>
                        <p>Raiponce</p>
                        <img src="../../../src/img/raiponce.jpg" alt="Raiponce">
                    </label>
                    <label for="s-choice8">
                        <input type="radio" name="s4" id="s-choice8" class="sondages-choix sondages-left" value="merida" required>
                        <p>Mérida</p>
                        <img src="../../../src/img/merida.jpg" alt="Mérida">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page5">
                <h3>Quelle est ta princesse préférée entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice9">
                        <input type="radio" name="s5" id="s-choice9" class="sondages-choix sondages-left" value="belle" required>
                        <p>Belle</p>
                        <img src="../../../src/img/belle.jpg" alt="Belle">
                    </label>
                    <label for="s-choice10">
                        <input type="radio" name="s5" id="s-choice10" class="sondages-choix sondages-left" value="aurore" required>
                        <p>Aurore</p>
                        <img src="../../../src/img/aurore.jpg" alt="Aurore">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page6">
                <h3>Quelle est ta princesse préférée entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice11">
                        <input type="radio" name="s6" id="s-choice11" class="sondages-choix sondages-left" value="blanche-neige" required>
                        <p>Blanche Neige</p>
                        <img src="../../../src/img/blanche-neige.jpg" alt="Blanche Neige">
                    </label>
                    <label for="s-choice12">
                        <input type="radio" name="s6" id="s-choice12" class="sondages-choix sondages-left" value="cendrillon" required>
                        <p>Cendrillon</p>
                        <img src="../../../src/img/cendrillon.jpg" alt="Cendrillon">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page7">
                <h3>Quelle est ta princesse préférée entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice13">
                        <input type="radio" name="s7" id="s-choice13" class="sondages-choix sondages-left" value="jasmine" required>
                        <p>Jasmine</p>
                        <img src="../../../src/img/jasmine.jpg" alt="Jasmine">
                    </label>
                    <label for="s-choice14">
                        <input type="radio" name="s7" id="s-choice14" class="sondages-choix sondages-left" value="ariel" required>
                        <p>Ariel</p>
                        <img src="../../../src/img/ariel.jpg" alt="Ariel">
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