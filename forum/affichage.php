<?php
    require_once '../config/config.php';
    
    $forum = $bdd->query('SELECT * FROM forum');

    foreach ($forum as $message)
    {
        $date_post = date_create($message['date_post']);
        echo "
            <div class='message'>
                <div class='pseudo-line'>
                    <h3>".$message['pseudo']."</h3>
                    <p>le ".date_format($date_post,'d M Y \à H:i')."</p>
                </div>
                <p class='message-line'>".htmlspecialchars_decode($message['message'])."</p>
            </div>";
    }