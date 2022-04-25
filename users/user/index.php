<?php
    session_start();
    require_once '../config/config.php';
    if(!isset($_SESSION['user'])){
        header('Location:../login/');
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
    <title>Espace membre</title>
</head>
<body>
    <h1>Bonjour <?php echo $data['pseudo']; ?></h1>
    <a href="../forgot/">Réinitialiser le mot de passe</a>
    <a href="../config/unlog.php">Déconnexion</a>
</body>
</html>