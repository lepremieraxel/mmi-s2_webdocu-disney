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
                            <p>Veuillez faire un choix dans chaque cas.</p>
                        </div>
                    <?php
                    break;

                    case 'already':
                    ?>
                        <div class="form-alert form-error">
                            <h6>Erreur</h6>
                            <p>Vous avez déjà répondu à ce sondage.</p>
                        </div>
                    <?php
                    break;
                }
            }
        ?>
        <div class="sondages-container">
            <form action="sondages.php" method="post">
                <div class="sondage-page active" id="page1">
                    <h3>Quelle est ton film préféré entre :</h3>
                    <div class="sondage-box">
                        <div class="sondage-cell">
                            <label for="s1-l">
                                <img src="../../../src/img/nouveaux-heros.jpg" alt="Les nouveaux héros">
                            </label>
                            <input type="radio" name="s1" id="s1-l" value="Les nouveaux héros" required>
                            <div class="sondage-check"></div>
                        </div>
                        <div class="sondage-cell">
                            <label for="s1-r">
                                <img src="../../../src/img/ralph.jpg" alt="Ralph 2.0">
                            </label>
                            <input type="radio" name="s1" id="s1-r" value="Ralph 2.0" required>
                            <div class="sondage-check"></div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button class="btnNext btn-sondage" type="button">Suivant</button>
                    </div>
                </div>
                <div class="sondage-page" id="page2">
                    <h3>Quelle est ton film préféré entre :</h3>
                    <div class="sondage-box">
                        <div class="sondage-cell">
                            <label for="s2-l">
                                <img src="../../../src/img/ratatouille.jpg" alt="Ratatouille">
                            </label>
                            <input type="radio" name="s2" id="s2-l" value="Ratatouille" required>
                            <div class="sondage-check"></div>
                        </div>
                        <div class="sondage-cell">
                            <label for="s2-r">
                                <img src="../../../src/img/arlo.jpg" alt="Le voyage d'Arlo">
                            </label>
                            <input type="radio" name="s2" id="s2-r" value="Le voyage d'Arlo" required>
                            <div class="sondage-check"></div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button class="btnPrev btn-sondage" type="button">Précédent</button>
                        <button class="btnNext btn-sondage" type="button">Suivant</button>
                    </div>
                </div>
                <div class="sondage-page" id="page3">
                    <h3>Quelle est ton film préféré entre :</h3>
                    <div class="sondage-box">
                        <div class="sondage-cell">
                            <label for="s3-l">
                                <img src="../../../src/img/dalmatiens.jpg" alt="Les 101 dalmatiens">
                            </label>
                            <input type="radio" name="s3" id="s3-l" value="Les 101 dalmatiens" required>
                            <div class="sondage-check"></div>
                        </div>
                        <div class="sondage-cell">
                            <label for="s3-r">
                                <img src="../../../src/img/aristochats.jpg" alt="Les aristochats">
                            </label>
                            <input type="radio" name="s3" id="s3-r" value="Les aristochats" required>
                            <div class="sondage-check"></div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button class="btnPrev btn-sondage" type="button">Précédent</button>
                        <button class="btnNext btn-sondage" type="button">Suivant</button>
                    </div>
                </div>
                <div class="sondage-page" id="page4">
                    <h3>Quelle est ton film préféré entre :</h3>
                    <div class="sondage-box">
                        <div class="sondage-cell">
                            <label for="s4-l">
                                <img src="../../../src/img/coco.jpg" alt="Coco">
                            </label>
                            <input type="radio" name="s4" id="s4-l" value="Coco" required>
                            <div class="sondage-check"></div>
                        </div>
                        <div class="sondage-cell">
                            <label for="s4-r">
                                <img src="../../../src/img/vice-versa.jpg" alt="Vice-versa">
                            </label>
                            <input type="radio" name="s4" id="s4-r" value="Vice-versa" required>
                            <div class="sondage-check"></div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button class="btnPrev btn-sondage" type="button">Précédent</button>
                        <button class="btnNext btn-sondage" type="button">Suivant</button>
                    </div>
                </div>
                <div class="sondage-page" id="page5">
                    <h3>Quelle est ton film préféré entre :</h3>
                    <div class="sondage-box">
                        <div class="sondage-cell">
                            <label for="s5-l">
                                <img src="../../../src/img/peter-pan.jpg" alt="Peter Pan">
                            </label>
                            <input type="radio" name="s5" id="s5-l" value="Peter Pan" required>
                            <div class="sondage-check"></div>
                        </div>
                        <div class="sondage-cell">
                            <label for="s5-r">
                                <img src="../../../src/img/clochette.jpg" alt="La fée Clochette">
                            </label>
                            <input type="radio" name="s5" id="s5-r" value="La fée Clochette" required>
                            <div class="sondage-check"></div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button class="btnPrev btn-sondage" type="button">Précédent</button>
                        <button class="btnNext btn-sondage" type="button">Suivant</button>
                    </div>
                </div>
                <div class="sondage-page" id="page6">
                    <h3>Quelle est ton film préféré entre :</h3>
                    <div class="sondage-box">
                        <div class="sondage-cell">
                            <label for="s6-l">
                                <img src="../../../src/img/raya.jpg" alt="Raya et le dernier dragon">
                            </label>
                            <input type="radio" name="s6" id="s6-l" value="Raya et le dernier dragon" required>
                            <div class="sondage-check"></div>
                        </div>
                        <div class="sondage-cell">
                            <label for="s6-r">
                                <img src="../../../src/img/luca.jpg" alt="Luca">
                            </label>
                            <input type="radio" name="s6" id="s6-r" value="Luca" required>
                            <div class="sondage-check"></div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button class="btnPrev btn-sondage" type="button">Précédent</button>
                        <button class="btnNext btn-sondage" type="button">Suivant</button>
                    </div>
                </div>
                <div class="sondage-page" id="page7">
                    <h3>Quelle est ton film préféré entre :</h3>
                    <div class="sondage-box">
                        <div class="sondage-cell">
                            <label for="s7-l">
                                <img src="../../../src/img/rox-rouky.jpg" alt="Rox et Rouky">
                            </label>
                            <input type="radio" name="s7" id="s7-l" value="Rox et Rouky" required>
                            <div class="sondage-check"></div>
                        </div>
                        <div class="sondage-cell">
                            <label for="s7-r">
                                <img src="../../../src/img/notre-dame.jpg" alt="Le bossu de Notre-Dame">
                            </label>
                            <input type="radio" name="s7" id="s7-r" value="Le bossu de Notre-Dame" required>
                            <div class="sondage-check"></div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button class="btnPrev btn-sondage" type="button">Précédent</button>
                        <button class="btnNext btn-sondage" type="button">Suivant</button>
                    </div>
                </div>
                <div class="sondage-page" id="page8">
                    <h3>Quelle est ton film préféré entre :</h3>
                    <div class="sondage-box">
                        <div class="sondage-cell">
                            <label for="s8-l">
                                <img src="../../../src/img/ours.jpg" alt="Frère des ours">
                            </label>
                            <input type="radio" name="s8" id="s8-l" value="Frère des ours" required>
                            <div class="sondage-check"></div>
                        </div>
                        <div class="sondage-cell">
                            <label for="s8-r">
                                <img src="../../../src/img/volt.jpg" alt="Volt, star malgré lui">
                            </label>
                            <input type="radio" name="s8" id="s8-r" value="Volt, star malgré lui" required>
                            <div class="sondage-check"></div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button class="btnPrev btn-sondage" type="button">Précédent</button>
                        <button class="btnNext btn-sondage" type="button">Suivant</button>
                    </div>
                </div>
                <div class="sondage-page" id="page9">
                    <h3>Quelle est ton film préféré entre :</h3>
                    <div class="sondage-box">
                        <div class="sondage-cell">
                            <label for="s9-l">
                                <img src="../../../src/img/cars.jpg" alt="Cars">
                            </label>
                            <input type="radio" name="s9" id="s9-l" value="Cars" required>
                            <div class="sondage-check"></div>
                        </div>
                        <div class="sondage-cell">
                            <label for="s9-r">
                                <img src="../../../src/img/planes.jpg" alt="Planes">
                            </label>
                            <input type="radio" name="s9" id="s9-r" value="Planes" required>
                            <div class="sondage-check"></div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button class="btnPrev btn-sondage" type="button">Précédent</button>
                        <button class="btn-sondage" type="submit">Terminer</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script src="../../../src/js/sondages.js"></script>
</body>
</html>