<?php
session_start();
require_once '../config/config.php';
if (!isset($_SESSION['user'])) {
  header('Location:../login/index.php?t=user');
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
  <link rel="stylesheet" href="../src/css/style.css">
  <link rel="shortcut icon" href="../src/img/logo_marvel_on-web_site.ico" type="image/x-icon">
  <title>Espace membre - Disney & Pixar</title>
</head>

<body>
  <?php
  include '../config/includes/menuToggle.php';
  include '../config/includes/header.php';
  ?>
  <div class="btn-user">
    <a href="settings/"><i class="fa-solid fa-gear"></i></a>
    <a href="../config/unlog.php"><i class="fa-solid fa-power-off"></i></a>
  </div>
  <main>
    <h2>Heureux de vous revoir <?php echo $data['pseudo']; ?> !</h2>
    <div class="user-container">
      <div class="user-box">
        <h3>Vos scores</h3>
        <?php include 'score.php'; ?>
      </div>
      <div class="user-box">
        <h3>Vos résultats des sondages</h3>
        <?php include 'sondage.php'; ?>
      </div>
    </div>
  </main>
  <?php include '../config/includes/footer.php';?>
</body>

</html>