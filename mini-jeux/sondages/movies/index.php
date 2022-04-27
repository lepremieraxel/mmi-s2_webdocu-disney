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
    <title>Les films - Disney & Pixar</title>
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
        <h2>Les films</h2>
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
                            <p>Veuillez choisir un film dans chaque ligne.</p>
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
                <h3>Quelle est ton film préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice1">
                        <input type="radio" name="s1" id="s-choice1" class="sondages-choix sondages-left" value="nouveaux-heros" required>
                        <p>Les nouveaux héros</p>
                        <img src="../../../src/img/nouveaux-heros.jpg" alt="Les nouveaux héros">
                    </label>
                    <label for="s-choice2">
                        <input type="radio" name="s1" id="s-choice2" class="sondages-choix sondages-left" value="ralph" required>
                        <p>Ralph 2.0</p>
                        <img src="../../../src/img/ralph.jpg" alt="Ralph 2.0">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page2">
                <h3>Quelle est ton film préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice3">
                        <input type="radio" name="s2" id="s-choice3" class="sondages-choix sondages-left" value="ratatouille" required>
                        <p>Ratatouille</p>
                        <img src="../../../src/img/ratatouille.jpg" alt="Ratatouille">
                    </label>
                    <label for="s-choice4">
                        <input type="radio" name="s2" id="s-choice4" class="sondages-choix sondages-left" value="arlo" required>
                        <p>Le voyage d'Arlo</p>
                        <img src="../../../src/img/arlo.jpg" alt="Le voyage d'Arlo">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page3">
                <h3>Quelle est ton film préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice5">
                        <input type="radio" name="s3" id="s-choice5" class="sondages-choix sondages-left" value="dalmatiens" required>
                        <p>Les 101 dalmatiens</p>
                        <img src="../../../src/img/dalmatiens.jpg" alt="Les 101 dalmatiens">
                    </label>
                    <label for="s-choice6">
                        <input type="radio" name="s3" id="s-choice6" class="sondages-choix sondages-left" value="aristochats" required>
                        <p>Les aristochats</p>
                        <img src="../../../src/img/aristochats.jpg" alt="Les aristochats">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page4">
                <h3>Quelle est ton film préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice7">
                        <input type="radio" name="s4" id="s-choice7" class="sondages-choix sondages-left" value="coco" required>
                        <p>Coco</p>
                        <img src="../../../src/img/coco.jpg" alt="Coco">
                    </label>
                    <label for="s-choice8">
                        <input type="radio" name="s4" id="s-choice8" class="sondages-choix sondages-left" value="vice-versa" required>
                        <p>Vice-versa</p>
                        <img src="../../../src/img/vice-versa.jpg" alt="Vice-versa">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page5">
                <h3>Quelle est ton film préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice9">
                        <input type="radio" name="s5" id="s-choice9" class="sondages-choix sondages-left" value="peter-pan" required>
                        <p>Peter Pan</p>
                        <img src="../../../src/img/peter-pan.jpg" alt="Peter Pan">
                    </label>
                    <label for="s-choice10">
                        <input type="radio" name="s5" id="s-choice10" class="sondages-choix sondages-left" value="clochette" required>
                        <p>La fée Clochette</p>
                        <img src="../../../src/img/clochette.jpg" alt="La fée Clochette">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page6">
                <h3>Quelle est ton film préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice11">
                        <input type="radio" name="S6" id="s-choice11" class="sondages-choix sondages-left" value="raya" required>
                        <p>Raya et le dernier dragon</p>
                        <img src="../../../src/img/raya.jpg" alt="Raya et le dernier dragon">
                    </label>
                    <label for="s-choice12">
                        <input type="radio" name="s6" id="s-choice12" class="sondages-choix sondages-left" value="luca" required>
                        <p>Luca</p>
                        <img src="../../../src/img/luca.jpg" alt="Luca">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page7">
                <h3>Quelle est ton film préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice13">
                        <input type="radio" name="s7" id="s-choice13" class="sondages-choix sondages-left" value="rox-rouky" required>
                        <p>ROw et Rouky</p>
                        <img src="../../../src/img/rox-rouky.jpg" alt="Row et Rouky">
                    </label>
                    <label for="s-choice14">
                        <input type="radio" name="s7" id="s-choice14" class="sondages-choix sondages-left" value="notre-dame" required>
                        <p>Le bossu de Notre-Dame</p>
                        <img src="../../../src/img/notre-dame.jpg" alt="Le bossu de Notre-Dame">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page8">
                <h3>Quelle est ton film préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice15">
                        <input type="radio" name="s8" id="s-choice15" class="sondages-choix sondages-left" value="ours" required>
                        <p>Frère des Ours</p>
                        <img src="../../../src/img/ours.jpg" alt="Frère des Ours">
                    </label>
                    <label for="s-choice16">
                        <input type="radio" name="s8" id="s-choice16" class="sondages-choix sondages-left" value="volt" required>
                        <p>Volt, star malgré lui</p>
                        <img src="../../../src/img/volt.jpg" alt="Volt, star malgré lui">
                    </label>
                </div>
            </div>
            <div class="sondages-page" id="page9">
                <h3>Quelle est ton film préféré entre :</h3>
                <div class="sondage-line">
                    <label for="s-choice17">
                        <input type="radio" name="s9" id="s-choice17" class="sondages-choix sondages-left" value="cars" required>
                        <p>Cars</p>
                        <img src="../../../src/img/cars.jpg" alt="Cars">
                    </label>
                    <label for="s-choice18">
                        <input type="radio" name="s9" id="s-choice18" class="sondages-choix sondages-left" value="planes" required>
                        <p>Planes</p>
                        <img src="../../../src/img/planes.jpg" alt="Planes">
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