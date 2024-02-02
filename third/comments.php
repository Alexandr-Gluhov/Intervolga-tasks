<?php
$comments = $pdo->query('SELECT comment FROM comments ORDER BY id DESC');
while ($comment = $comments->fetch()) {
    echo '<div class="comment">' . $comment['comment'] . '</div>';
}
