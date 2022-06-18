<?php

require 'includes/database.php';
require 'includes/article-functions.php';
require 'includes/auth.php';
session_start();

$conn = getDB();

if (isset($_GET['id'])) {

   $article = getArticle($conn, $_GET['id']);

} else {
    $article = null;
}

?>
<?php require 'includes/header.php'; ?>

<?php if ($article === null): ?>
<p>Article not found.</p>
<?php else: ?>

<article>
 <h2><?= htmlspecialchars($article['title']); ?></h2>
 <p><?= htmlspecialchars($article['content']); ?></p>
</article>

<?php if ( ! isLoggedIn()):?>

<div style="display:none;">
 <a href="edit-article.php?id=<?= $article['id']; ?>">Edit</a>
 <a href="delete-article.php?id=<?= $article['id']; ?>">Delete</a>
</div>
<?php else: ?>
<div>
 <a href="edit-article.php?id=<?= $article['id']; ?>">Edit</a>
 <a href="delete-article.php?id=<?= $article['id']; ?>">Delete</a>
</div>

<?php endif; ?>


<?php endif; ?>

<?php require 'includes/footer.php'; ?>