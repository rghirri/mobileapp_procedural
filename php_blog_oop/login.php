<?php
require 'includes/init.php';
//require 'includes/url-function.php';
// require 'classes/Url.php';
// require 'classes/User.php';
// require 'classes/Database.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $conn = require 'includes/db.php';

    if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {
        session_regenerate_id(true);

        $_SESSION['is_logged_in'] = true;
            //redirect('/');
            Url::redirect('/');
    } else {
        //$_SESSION['is_logged_in'] = false;

        $error = 'login incorrect';
    }
}
?>

<?php require 'includes/header.php'; ?>

<h2>Login</h2>

<?php if (!empty($error)): ?>
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