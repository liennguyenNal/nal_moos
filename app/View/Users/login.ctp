
<!DOCTYPE html>
<html>
<head>
  <title>[:. MOOS .:]</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <meta name="description" content="mô tả website" />
  <meta name="keywords" content="những từ khóa của website bạn" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- <link rel="icon" href="img/front/favicon.ico" type="image/x-icon" /> -->
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap-theme.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/swiper.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/common.css" type="text/css" media="screen" />
</head>
<body class="page">
  <div id="wrapper">    
    <header id="head-container">
      <div class="container-fluid">
        <h1 id="logo" class="float-none">
          <a href="<?php echo $this->webroot; ?>"></a>
        </h1>
      </div>
    </header>
        
    <section id="content-container">
      <div class="welcome-sup-page">
        <div class="container-fluid">
          <h2>ようこそゲスト様</h2>
        </div>
      </div>
      <div class="title-sup-page">
        <div class="container-fluid">
          <h3>マイページログイン</h3>
        </div>
      </div>

      <!-- Login form -->
      <form action="login" method="POST">
        <div class="from-login">
          <div class="container-fluid">
            <div class="from-ldpage">
              <div class="content">
                <div class="container-fluid">
                  <div class="content-from">
                    <div class="content-from-block">
                      <p class="note">パスワードを忘れた方は<a href="forgot_password">こちら</a>
                        </br>会員登録がお済みでない方は<a href="register">こちら</a>
                      </p>
                      <div class="content-from-how">
                        <table class="from">
                          <tbody>
                            <tr>
                              <td class="label-text"><label>ID</label><span>必須</span></td>
                              <td>
                                <div class="block-input">
                                  <!-- <input class="w198" type="text" name="" value="" placeholder=""> -->
                                  <input class="w198" type="text" name="data[User][email]" value="" placeholder="">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="label-text"><label>パスワード</label><span>必須</span></td>
                              <td>
                                <div class="block-input">
                                  <!-- <input class="w198" type="text" name="" value="" placeholder=""> -->
                                  <input class="w198" type="password" name="data[User][password]" value="" placeholder="">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="block-note">
                        <div class="block-button">
                          <!-- <button type="button"><img src="<?php echo $this->webroot; ?>img/front/text-login.png" alt="ログイン"/></button> -->
                          <button type="submit" name="commit" value="Login"><img src="<?php echo $this->webroot; ?>img/front/text-login.png" alt="ログイン"/></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- End login form -->

    </section>
  </div>
  <div class="block-menu-footer">
    <?php echo $this->element('menu-footer'); ?>
  </div>
  <footer id="footer-container" class="footer-page">
    <?php echo $this->element('footer'); ?>
  </footer>
  <script src="<?php echo $this->webroot; ?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/swiper.jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/common.js" type="text/javascript"></script>
</body>
</html>