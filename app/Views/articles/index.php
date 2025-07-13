<?php
// app/Views/articles/index.php
foreach ($articles as $article) {
    echo "<h2>{$article['title']}</h2>";
    echo "<p>".substr($article['content'], 0, 100)."...</p>";
    echo "<a href='/articles/view/{$article['id']}'>Read More</a><hr>";
}
?>