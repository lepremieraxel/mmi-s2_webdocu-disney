<?php
require_once '../config/config.php';

if (isset($_POST['password']) && isset($_POST['password_retype']) && isset($_POST['token'])) {
  if (!empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['token'])) {
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);
    $token = htmlspecialchars($_POST['token']);

    $check = $bdd->prepare('SELECT * FROM users WHERE token = ?');
    $check->execute(array($token));
    $row = $check->rowCount();

    if ($row) {
      if ($password === $password_retype) {
        $cost = ['cost' => 12];
        $password = password_hash($password, PASSWORD_BCRYPT, $cost);

        $update = $bdd->prepare('UPDATE users SET password = ? WHERE token = ?');
        $update->execute(array($password, $token));

        $delete = $bdd->prepare('DELETE FROM password_recover WHERE token_user = ?');
        $delete->execute(array($token));

        header('Location:password_change.php?u=' . base64_encode($token) . '&recov_err=success');
      } else header('Location:password_change.php?u=' . base64_encode($token) . '&recov_err=password');
      die();
    } else header('Location:index.php?forg_err=email');
    die();
  } else header('Location:password_change.php?recov_err=password');
  die();
} else header('Location:password_change.php?recov_err=password');
die();
