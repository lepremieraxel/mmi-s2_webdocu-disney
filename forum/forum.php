<?php
    session_start();
    require_once '../config/config.php';

    if(isset($_POST['message']) && !empty($_POST['message']))
    {
        $message = htmlspecialchars($_POST['message']);

        $check = $bdd->prepare('SELECT token, pseudo FROM users WHERE token = ?');
        $check->execute(array($_SESSION['user']));
        $data = $check->fetch();

        if(strlen($message) <= 350)
        {
            $insert = $bdd->prepare('INSERT INTO forum(pseudo, message, token_user, token) VALUES(:pseudo, :message, :token_user, :token)');
            $insert->execute(array(
                'pseudo' => $data['pseudo'],
                'message' => $message,
                'token_user' => $data['token'],
                'token' => bin2hex(openssl_random_pseudo_bytes(64)
                )
            ));
            header('Location:../forum/'); die();
        }else header('Location:index.php?forum_err=length'); die();
    }else header('Location:index.php?forum_err=empty'); die();