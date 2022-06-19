<?php

require 'classes/Database.php';
require 'classes/Article.php';
//require 'includes/article-functions.php';
require 'classes/Auth.php';

session_start();

$db = new Database();
$conn = $db->getConn();

if (isset($_GET['id'])) {

   $article = Article::getByID($conn, $_GET['id']);

//    var_dump($article);

} else {
    $article = null;
}

?>
<?php require 'includes/header.php'; ?>

<?php if ($article): ?>
<article>
 <h2><?= htmlspecialchars($article->title); ?></h2>
 <p><?= htmlspecialchars($article->content); ?></p>
 <?php if (!Auth::isLoggedIn()):?>

 <div style="display:none;">
  <a href="edit-article.php?id=<?= $article->id; ?>">Edit</a>
  <a href="delete-article.php?id=<?= $article->id; ?>">Delete</a>
 </div>
 <?php else: ?>
 <div>
  <a href="edit-article.php?id=<?= $article->id; ?>">Edit</a>
  <a href="delete-article.php?id=<?= $article->id; ?>">Delete</a>
 </div>

 <?php endif; ?>
</article>
<?php else: ?>
<p>Article not found.</p>
<?php endif; ?>

<?php require 'includes/footer.php'; ?>