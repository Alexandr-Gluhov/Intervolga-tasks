<?php

$user = 'php';
$pass = '1234';

$pdo = new PDO('mysql:host=localhost;dbname=task', $user, $pass);

if (isset($_POST['comment'])) {

    $query = $pdo->prepare("INSERT INTO comments (comment) VALUES (:comm)");
    $query->bindParam(':comm', htmlspecialchars($_POST['comment']));
    $query->execute();

    //После обработки post-запроса совершаем редирект, предотвращая повторую отправку данных на сервер
?>
    <script>
        location.replace("index.php");
    </script>
<?php

}

$comments = $pdo->query('SELECT comment FROM comments ORDER BY id DESC');
while ($comment = $comments->fetch()) {
    echo '<div class="comment">' . $comment['comment'] . '</div>';
}
