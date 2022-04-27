<?php
session_start();
    require_once '../../../config/config.php';

    if(isset($_POST['s1']) && isset($_POST['s2']) && isset($_POST['s3']) && isset($_POST['s4']) && isset($_POST['s5']) && isset($_POST['s6']) && isset($_POST['s7']) && isset($_POST['s8']) && isset($_POST['s9']))
    {
        $s1 = htmlspecialchars($_POST['s1']);
        $s2 = htmlspecialchars($_POST['s2']);
        $s3 = htmlspecialchars($_POST['s3']);
        $s4 = htmlspecialchars($_POST['s4']);
        $s5 = htmlspecialchars($_POST['s5']);
        $s6 = htmlspecialchars($_POST['s6']);
        $s7 = htmlspecialchars($_POST['s7']);
        $s8 = htmlspecialchars($_POST['s8']);
        $s9 = htmlspecialchars($_POST['s9']);

        $check = $bdd->prepare('SELECT * FROM s_films WHERE token_user = ?');
        $check->execute(array($_SESSION['user']));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0)
        {
            $insert = $bdd->prepare('INSERT INTO s_films(token_user, token, s1, s2, s3, s4, s5, s6, s7, s8, s9) VALUES(:token_user, :token, :s1, :s2, :s3, :s4, :s5, :s6, :s7, :s8, :s9)');
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
                's9' => $s9,
            ));
            header('Location:index.php?sondage_err=success'); die();
        }else{
            $update = $bdd->prepare('UPDATE s_films SET s1 = ?, s2 = ?, s3 = ?, s4 = ?, s5 = ?, s6 = ?, s7 = ?, s8 = ?, s9 = ? WHERE token_user = ?');
            $update->execute(array($s1, $s2, $s3, $s4, $s5, $s6, $s7, $s8, $s9, $_SESSION['user']));
            header('Location:index.php?sondage_err=update'); die();
        }
    }else header('Location:index.php?sondage_err=empty'); die();