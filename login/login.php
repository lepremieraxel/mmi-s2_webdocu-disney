<?php

session_start();
require_once '../config/config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $email = strtolower($email);
  $url = $_POST['url'];
  $check = $bdd->prepare('SELECT pseudo, email, password, token FROM users WHERE email = ?');
  $check->execute(array($email));
  $data = $check->fetch();
  $row = $check->rowCount();

  if ($row > 0) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      if (password_verify($password, $data['password'])) {
        $_SESSION['user'] = $data['token'];
        header('Location:../'.$url);
      } else header('Location:index.php?login_err=password');
    } else header('Location:index.php?login_err=email');
  } else header('Location:index.php?login_err=already');
} else header('Location:index.php');
