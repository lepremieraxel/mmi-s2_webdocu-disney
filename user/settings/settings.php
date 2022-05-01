<?php
require_once '../../config/config.php';

foreach ($bdd->query('SELECT * FROM forum') as $message) {
  if ($message['token_user'] == $_SESSION['user']) {
    $date_post = date_create($message['date_post']);
    echo "
                <div class='settings-msg'>
                    <div class='pseudo-line'>
                        <h3>Message envoyé le " . date_format($date_post, 'd M Y') . "</h3>
                        <form method='post' action='delete-msg.php'>
                            <input type='hidden' name='token' value='" . $message['token'] . "'>
                            <button type='submit'><i class='fa-solid fa-trash'></i></button>
                        </form>
                    </div>
                    <p class='message-line'>" . htmlspecialchars_decode($message['message']) . "</p>
                </div>";
  }
}
