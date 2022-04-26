<?php
    require_once '../../config/config.php';
    
    $token = $_POST['token'];

    $check = $bdd->prepare('SELECT * FROM forum WHERE token = ?');
    $check->execute(array($token));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row > 0)
    {
        $delete = $bdd->prepare('DELETE FROM forum WHERE token = ?');
        $delete->execute(array($token));
        header('Location:index.php?del_err=success'); die();
    }else header('Location:index.php?del_err=already'); die();