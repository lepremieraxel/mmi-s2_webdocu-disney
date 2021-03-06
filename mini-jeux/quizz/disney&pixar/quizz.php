<?php
session_start();
require_once "../../../config/config.php";

if (isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']) && isset($_POST['q4']) && isset($_POST['q5']) && isset($_POST['q6']) && isset($_POST['q7']) && isset($_POST['q8']) && isset($_POST['q9']) && isset($_POST['q10'])) {
  $q1 = htmlspecialchars($_POST['q1']);
  $q2 = htmlspecialchars($_POST['q2']);
  $q3 = htmlspecialchars($_POST['q3']);
  $q4 = htmlspecialchars($_POST['q4']);
  $q5 = htmlspecialchars($_POST['q5']);
  $q6 = htmlspecialchars($_POST['q6']);
  $q7 = htmlspecialchars($_POST['q7']);
  $q8 = htmlspecialchars($_POST['q8']);
  $q9 = htmlspecialchars($_POST['q9']);
  $q10 = htmlspecialchars($_POST['q10']);

  $check = $bdd->prepare('SELECT * FROM q_disney WHERE token_user = ?');
  $check->execute(array($_SESSION['user']));
  $data = $check->fetch();
  $row = $check->rowCount();

  if ($row == 0) {
    $score = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10;
    $insert = $bdd->prepare('INSERT INTO q_disney(token_user, token, score) VALUES(:token_user, :token, :score)');
    $insert->execute(array(
      'token_user' => $_SESSION['user'],
      'token' => bin2hex(openssl_random_pseudo_bytes(64)),
      'score' => $score
    ));
    header('Location:../index.php?game_err=success&s=' . $score);
    die();
  } else header('Location:index.php?quizz_err=already');
  die();
} else header('Location:index.php?quizz_err=empty');
die();
