<?php

require 'includes/database.php';
require 'includes/article-functions.php';
require 'includes/url-function.php';
 require 'includes/auth.php';

session_start();

if ( ! isLoggedIn()) {

    die("unauthorised");

}

$conn = getDB();

if (isset($_GET['id'])) {

   $article = getArticle($conn, $_GET['id'], 'id');

   if ($article){
    
     $id = $article['id'];

   }else
   {
     die("article not found");
   }

 } else {

     die("id not supplied, article not found");
     
 }

 if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

  $sql = "DELETE FROM article
          WHERE id = ?"; 

    //var_dump($sql); exit;                

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {

        echo mysqli_error($conn);

    } else {

       mysqli_stmt_bind_param($stmt, "i", $id);

      if (mysqli_stmt_execute($stmt)){

      redirect("/index.php");
         
      }else{

          echo mysqli_stmt_error($stmt);
          
      }      
   }
 }
 ?>

<?php require "includes/header.php"; ?>

<h2>Delete Article</h2>
<form method="POST">
 <p>Are you sure?</p>
 <button>Delete</button>
 <a href="article.php?id=<?= $article['id']; ?>">Cancel</a>
</form>

<?php require "includes/footer.php"; ?>