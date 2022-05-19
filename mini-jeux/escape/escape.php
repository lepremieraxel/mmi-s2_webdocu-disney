<?php
session_start();
require_once '../../config/config.php';

if(isset($_POST['input1']) && isset($_POST['input2']) && isset($_POST['input3']) && !empty($_POST['input1']) && !empty($_POST['input2']) && !empty($_POST['input3'])){

  $input1 = htmlspecialchars($_POST['input1']);
  $input2 = htmlspecialchars($_POST['input2']);
  $input3 = htmlspecialchars($_POST['input3']);
  $temps = htmlspecialchars($_POST['temps']);

  $check = $bdd->prepare('SELECT * FROM escape_game WHERE token_user = ?');
  $check->execute(array($_SESSION['user']));
  $data = $check->fetch();
  $row = $check->rowCount();

  if($row == 0){
    if($input1 == 6 && $input2 == 3 && $input3 == 2){
      $insert = $bdd->prepare('INSERT INTO escape_game(token, token_user, fait, temps) VALUES(:token, :token_user, :fait, :temps)');
      $insert->execute(array(
        'token' => bin2hex(openssl_random_pseudo_bytes(64)),
        'token_user' => $_SESSION['user'],
        'fait' => true,
        'temps' => $temps
      ));
      header('Location:../index.php?game_err=escape&s=' .$temps); die();
    } else header('Location:index.php?e=false'); die();
  } else header('Location:../index.php?game_err=already&s='); die();
}