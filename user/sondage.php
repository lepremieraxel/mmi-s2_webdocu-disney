<?php
require_once '../config/config.php';
// Sondage Princesses
foreach ($bdd->query('SELECT * FROM s_princess') as $score) {
  if ($score['token_user'] == $_SESSION['user']) {
    $date = date_create($score['date']);
    echo "
    <div class='user-cell'>
    <div class='title-line'>
      <h3>Sondages - Les princesses</h3>
      <p>le " . date_format($date, 'd M Y') . "</p>
    </div>
    <div class='result-line'>
      <p>Vous avez répondu :</p>
      <ul>
        <li>" . $score['s1'] . "</li>
        <li>" . $score['s2'] . "</li>
        <li>" . $score['s3'] . "</li>
        <li>" . $score['s4'] . "</li>
        <li>" . $score['s5'] . "</li>
        <li>" . $score['s6'] . "</li>
      </ul>
    </div>
  </div>";
  }
}
// Sondage Personnages
foreach ($bdd->query('SELECT * FROM s_perso') as $score) {
  if ($score['token_user'] == $_SESSION['user']) {
    $date = date_create($score['date']);
    echo "
    <div class='user-cell'>
    <div class='title-line'>
      <h3>Sondages - Les personnages</h3>
      <p>le " . date_format($date, 'd M Y') . "</p>
    </div>
    <div class='result-line'>
      <p>Vous avez répondu :</p>
      <ul>
        <li>" . $score['s1'] . "</li>
        <li>" . $score['s2'] . "</li>
        <li>" . $score['s3'] . "</li>
        <li>" . $score['s4'] . "</li>
        <li>" . $score['s5'] . "</li>
        <li>" . $score['s6'] . "</li>
        <li>" . $score['s7'] . "</li>
        <li>" . $score['s8'] . "</li>
      </ul>
    </div>
  </div>";
  }
}
// Sondage Films
foreach ($bdd->query('SELECT * FROM s_films') as $score) {
  if ($score['token_user'] == $_SESSION['user']) {
    $date = date_create($score['date']);
    echo "
    <div class='user-cell'>
    <div class='title-line'>
      <h3>Sondages - Les personnages</h3>
      <p>le " . date_format($date, 'd M Y') . "</p>
    </div>
    <div class='result-line'>
      <p>Vous avez répondu :</p>
      <ul>
        <li>" . $score['s1'] . "</li>
        <li>" . $score['s2'] . "</li>
        <li>" . $score['s3'] . "</li>
        <li>" . $score['s4'] . "</li>
        <li>" . $score['s5'] . "</li>
        <li>" . $score['s6'] . "</li>
        <li>" . $score['s7'] . "</li>
        <li>" . $score['s8'] . "</li>
        <li>" . $score['s9'] . "</li>
      </ul>
    </div>
  </div>";
  }
}
