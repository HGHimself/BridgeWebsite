<?php include "init.php"; ?>
<!DOCTYPE html>
<html>
  <head>
		<?php include $pathToRoot . $incLocation . "meta.php"; ?>
    <title>Authentication</title>
	</head>
  <body>
		<?php include $pathToRoot . $incLocation . "header.php"; ?>
		<?php include $pathToRoot . $incLocation . "nav.php"; ?>
		<main>
	    <div class="row center _2-3rd">
        <div class='playing-card card'>
          <?php if(!isset($_GET['t']) || $_GET['t'] == 'login'): ?>
            <h3>Login</h3>
            <form class='card' id='login_form' action='<?php echo $pathToRoot; ?>' method='post'>
              <div class='row form_input'>
                <label class='left' for='login_username'>Username:</label>
                <input class='right' type='text' name='login_username' id='login_username' required>
              </div>
              <div class='row form_input'>
                <label class='left' for='login_password'>Password:</label>
                <input class='right' type='password' name='login_password' id='login_password' required>
              </div>
              <div class='row form_input'>
                <input class='right' type='submit' name='login' id='login_submit' value='Login'>
              </div>
              <a href="./?t=register">Create A Profile</a>
            </form>
          <?php elseif($_GET['t'] == 'register'): ?>
            <h3>Register</h3>
            <form class='card' id='register_form' action='./?t=login' method='post'>
              <div class='row form_input'>
                <label class='left' for='register_username'>Username:</label>
                <input class='right' type='text' name='register_username' id='login_username' required>
              </div>
              <div class='row form_input'>
                <label class='left' for='register_password'>Password:</label>
                <input class='right' type='password' name='register_password' id='login_password' required>
              </div>
              <div class='row form_input'>
                <label class='left' for='register_password_confirm'>Confirm Password:</label>
                <input class='right' type='password' name='register_password_confirm' id='login_password_confirm' required>
              </div>
              <div class='row form_input'>
                <label class='left' for='register_name'>Name:</label>
                <input class='right' type='text' name='register_name' id='register_name' required>
              </div>
              <div class='row form_input'>
                <label class='left' for='register_email'>Email:</label>
                <input class='right' type='text' name='register_email' id='register_email' required>
              </div>
              <div class='row form_input'>
                <label class='left' for='register_role'>Role:</label>
                <input class='right' type='text' name='register_role' id='register_role' required>
              </div>
              <div class='row form_input'>
                <input class='right' type='submit' name='register' id='register_submit' value='Register'>
              </div>
              <a href='./?t=login'>Already Have A Profile?</a>
            </form>
          <?php else: ?>
            <h3>Thank You For Logging Out!</h3>
          <?php endif; ?>
        </div>
      </div>
		</main>
		<?php include $pathToRoot . $incLocation . "footer.php"; ?>
  </body>
</html>
