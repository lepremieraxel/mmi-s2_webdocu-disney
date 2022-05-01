<?php
require_once '../config/config.php';
// Quizz Disney
foreach ($bdd->query('SELECT * FROM q_disney') as $score) {
  if ($score['token_user'] == $_SESSION['user']) {
    $date = date_create($score['date']);
    echo "
            <div class='user-cell'>
            <div class='title-line'>
              <h3>Quizz - Disney & Pixar</h3>
              <p>le " . date_format($date, 'd M Y') . "</p>
            </div>
            <p class='result-line'>Vous avez eu un score de&ensp;<span>" . htmlspecialchars_decode($score['score']) . "/" . htmlspecialchars_decode($score['scoreMax']) . "</span>.</p>
          </div>";
  }
}
// Quizz Culture Générale
foreach ($bdd->query('SELECT * FROM q_cultureg') as $score) {
  if ($score['token_user'] == $_SESSION['user']) {
    $date = date_create($score['date']);
    echo "
          <div class='user-cell'>
          <div class='title-line'>
            <h3>Quizz - Culture Générale</h3>
            <p>le " . date_format($date, 'd M Y') . "</p>
          </div>
          <p class='result-line'>Vous avez eu un score de&ensp;<span>" . htmlspecialchars_decode($score['score']) . "/" . htmlspecialchars_decode($score['scoreMax']) . "</span>.</p>
        </div>";
  }
}
// Quizz Escape
foreach ($bdd->query('SELECT * FROM q_escape') as $score) {
  if ($score['token_user'] == $_SESSION['user']) {
    $date = date_create($score['date']);
    echo "
        <div class='user-cell'>
        <div class='title-line'>
          <h3>Quizz - L'escape game</h3>
          <p>le " . date_format($date, 'd M Y') . "</p>
        </div>
        <p class='result-line'>Vous avez eu un score de&ensp;<span>" . htmlspecialchars_decode($score['score']) . "/" . htmlspecialchars_decode($score['scoreMax']) . "</span>.</p>
      </div>";
  }
}
// Lyrics
foreach ($bdd->query('SELECT * FROM q_lyrics') as $score) {
  if ($score['token_user'] == $_SESSION['user']) {
    $date = date_create($score['date']);
    echo "
        <div class='user-cell'>
        <div class='title-line'>
          <h3>Termines les paroles</h3>
          <p>le " . date_format($date, 'd M Y') . "</p>
        </div>
        <p class='result-line'>Vous avez eu un score de&ensp;<span>" . htmlspecialchars_decode($score['score']) . "/" . htmlspecialchars_decode($score['scoreMax']) . "</span>.</p>
      </div>";
  }
}
