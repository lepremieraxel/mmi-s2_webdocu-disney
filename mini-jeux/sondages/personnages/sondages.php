<?php
session_start();
    require_once '../../../config/config.php';

    if(isset($_POST['s1']) && isset($_POST['s2']) && isset($_POST['s3']) && isset($_POST['s4']) && isset($_POST['s5']) && isset($_POST['s6']) && isset($_POST['s7']) && isset($_POST['s8']))
    {
        $s1 = htmlspecialchars($_POST['s1']);
        $s2 = htmlspecialchars($_POST['s2']);
        $s3 = htmlspecialchars($_POST['s3']);
        $s4 = htmlspecialchars($_POST['s4']);
        $s5 = htmlspecialchars($_POST['s5']);
        $s6 = htmlspecialchars($_POST['s6']);
        $s7 = htmlspecialchars($_POST['s7']);
        $s8 = htmlspecialchars($_POST['s8']);

        $check = $bdd->prepare('SELECT * FROM s_perso WHERE token_user = ?');
        $check->execute(array($_SESSION['user']));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0)
        {
            $insert = $bdd->prepare('INSERT INTO s_perso(token_user, token, s1, s2, s3, s4, s5, s6, s7, s8) VALUES(:token_user, :token, :s1, :s2, :s3, :s4, :s5, :s6, :s7, :s8)');
            $insert->execute(array(
                'token_user' => $_SESSION['user'],
                'token' => bin2hex(openssl_random_pseudo_bytes(64)),
                's1' => $s1,
                's2' => $s2,
                's3' => $s3,
                's4' => $s4,
                's5' => $s5,
                's6' => $s6,
                's7' => $s7,
                's8' => $s8,
            ));
            header('Location:../index.php?game_err=success'); die();
        }else header('Location:index.php?sondage_err=already'); die();
    }else header('Location:index.php?sondage_err=empty'); die();