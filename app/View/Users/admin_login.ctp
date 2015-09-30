<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="<?php echo $this->webroot;?>css/login_style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Admin Login - Moos</h1>
      <?php echo $this->Form->create("User", array('action'=>'login')) ?>
        <p><input type="text" name="data[User][username]" value="" placeholder="Username"></p>
        <p><input type="password" name="data[User][password]" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="reset_password">Click here to reset it</a>.</p>
    </div>
     <div class="login-help">
      <p>You don't have an account? <a href="register">Click here to register it</a>.</p>
    </div>
  </section>

</body>
</html>
