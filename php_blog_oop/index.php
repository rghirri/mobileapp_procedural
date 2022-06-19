<?php

require 'classes/Database.php';
require 'classes/Article.php';
require 'classes/Auth.php';

session_start();

$db = new Database();
$conn = $db->getConn();

$articles = Article::getAll($conn);
 //var_dump($articles);

?>
<?php require 'includes/header.php'; ?>

<?php if (Auth::isLoggedIn()): ?>

<p>You are logged in. <a href="logout.php">Log out</a></p>
<?php else: ?>
<p>You are not logged in <a href="login.php">Login</a></p>
<?php endif; ?>

<?php if (empty($articles)): ?>
<p>No articles found.</p>
<?php else: ?>

<ul>
 <?php if (!Auth::isLoggedIn()):?>
 <div style="display:none;">
  <a href="/new-article.php">New Article</a>
 </div>
 <?php else: ?>
 <div>
  <a href="/new-article.php">New Article</a>
 </div>

 <?php endif; ?>

 <?php foreach ($articles as $article): ?>
 <li>
  <article>
   <h2><a href="article.php?id=<?= $article->id; ?>"><?= htmlspecialchars($article->title); ?></a></h2>
   <p><?= htmlspecialchars($article->content); ?></p>
  </article>
 </li>
 <?php endforeach; ?>
</ul>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>