<?php 
require 'includes/url-function.php';


session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST"){

   if ($_POST['username'] == 'Rayaa' && $_POST['password'] == 'password'){
     session_regenerate_id(true);

    $_SESSION['is_logged_in'] = true;
    
    redirect('/');
    
   }else
   {

    //$_SESSION['is_logged_in'] = false;

    $error = "login incorrect";

   }
 }

?>

<?php require 'includes/header.php'; ?>

<h2>Login</h2>

<?php if(! empty($error)): ?>
<p><?= $error ?></p>
<?php endif; ?>

<form action="" method="POST">

 <div>
  <label for="username">Username</label>
  <input name="username" id="username">
 </div>

 <div>
  <label for="password">Password</label>
  <input type="password" name="password" id="password">
 </div>

 <button>Log in</button>

</form>

<?php require 'includes/footer.php'; ?>


<!-- $_SESSION['is_logged_in'] = true; -->