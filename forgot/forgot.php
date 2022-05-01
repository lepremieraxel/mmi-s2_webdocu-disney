<?php
require_once '../config/config.php';

if (isset($_POST['email']) && !empty($_POST['email'])) {
  $email = htmlspecialchars($_POST['email']);
  $email = strtolower($email);

  $check = $bdd->prepare('SELECT token FROM users WHERE email = ?');
  $check->execute(array($email));
  $data = $check->fetch();
  $row = $check->rowCount();

  if ($row) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $token = bin2hex(openssl_random_pseudo_bytes(24));
      $token_user = $data['token'];

      $insert = $bdd->prepare('INSERT INTO password_recover(token_user, token) VALUES(?,?)');
      $insert->execute(array($token_user, $token));

      $link = 'http://www.axel-marcial.ml/web-docu/forgot/recover.php?u=' . base64_encode($token_user) . '&token=' . base64_encode($token);

      $myemail = 'contact@axel-marcial.ml';
      $to = $email;
      $email_subject = "Reinitialisation du mot de passe - Disney & Pixar";
      $email_body = "Cliquez sur ce lien pour reinitialiser votre mot de passe : $link";
      $headers = "From: $myemail\n";
      mail($to, $email_subject, $email_body, $headers);
      header('Location:../user/settings/index.php?forg_err=success');
      die();
    } else header('Location:../user/settings/index.php?forg_err=email');
    die();
  } else header('Location:../user/settings/index.php?forg_err=email');
}
