<?php
require 'includes/init.php';
// require 'classes/Database.php';
// require 'classes/Article.php';
//require 'includes/article-functions.php';
//require 'includes/url-function.php';
// require 'classes/Url.php';
// require 'classes/Auth.php';


if (!Auth::isLoggedIn()) {
    die('unauthorised');
}

$conn = require 'includes/db.php';

if (isset($_GET['id'])) {
    $article = Article::getById($conn, $_GET['id']);
    // var_dump($article);
    if (!$article) {
        die('article not found');
    }
} else {
    die('id not supplied, article not found');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($article->delete($conn)) {
        //redirect('/index.php');
        Url::redirect('/index.php');
    }
    
}
?>

<?php require 'includes/header.php'; ?>

<h2>Delete Article</h2>
<form method="POST">
 <p>Are you sure?</p>
 <button>Delete</button>
 <a href="article.php?id=<?= $article->id; ?>">Cancel</a>
</form>

<?php require 'includes/footer.php'; ?>