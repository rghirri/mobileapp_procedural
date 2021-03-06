<?php
require 'includes/init.php';
// require 'classes/Database.php';
// require 'classes/Article.php';
// require 'includes/article-functions.php';
//require 'includes/url-function.php';
// require 'classes/Url.php';
// require 'classes/Auth.php';

if (!Auth::isLoggedIn()) {

    die("unauthorised");

}

$conn = require 'includes/db.php';

if (isset($_GET['id'])) {

   $article = Article::getById($conn, $_GET['id']);
    // var_dump($article);

   if (! $article){
    die("article not found");
   }

} else {

    die("id not supplied, article not found");
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $article->title        = $_POST['title'];
    $article->content      = $_POST['content'];
    $article->published_at = $_POST['published_at'];

      if ($article->update($conn)){

      //redirect("/article.php?id={$article->id}");
      Url::redirect("/article.php?id={$article->id}");
         
      }  
    }
?>

<?php require 'includes/header.php'; ?>

<h2>Edit article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>