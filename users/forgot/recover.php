<?php
    require_once '../config/config.php';

    if(isset($_GET['u']) && isset($_GET['token']) && !empty($_GET['u']) && !empty($_GET['token']))
    {
        $u = htmlspecialchars(base64_decode($_GET['u']));
        $token = htmlspecialchars(base64_decode($_GET['token']));

        $check = $bdd->prepare('SELECT * FROM password_recover WHERE token_user = ? AND token = ?');
        $check->execute(array($u, $token));
        $row = $check->rowCount();

        if($row)
        {
            $get = $bdd->prepare('SELECT token FROM users WHERE token = ?');
            $get->execute(array($u));
            $data_u = $get->fetch();

            if(hash_equals($data_u['token'], $u))
            {
                header('Location:password_change.php?u='.base64_encode($u)); die();
            }else header('Location:index.php?forg_err=email'); die();
        }else header('Location:index.php?forg_err=email'); die();
    }else header('Location:../../erreur_404/'); die();