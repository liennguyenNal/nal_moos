<!DOCTYPE html>
<html>
<head>
  <title>入居審査用マイページログイン｜家賃でもらえる家</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <meta name="description" content="「家賃でもらえる家」の入居審査お申し込み用マイページのログイン画面です。ご登録いただいたID(メールアドレス)と、別ページにてお客様にご設定いただきましたパスワードを入力し、ログインしてください。" />
  <meta name="keywords" content="家、家賃、賃貸、住宅ローン審査、入居審査、マイホーム、マイページ、ログイン" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="icon" href="<?php echo $this->webroot; ?>favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo $this->webroot;?>css/bootstrap.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot;?>css/bootstrap-theme.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot;?>css/swiper.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot;?>css/common.css" type="text/css" media="screen" />
  <script src="<?php echo $this->webroot;?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo $this->webroot; ?>js/jquery-validate.bootstrap-tooltip.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot;?>js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot;?>js/swiper.jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot;?>js/common.js" type="text/javascript"></script>
  <style type="text/css" media="screen">
    .title-sup-page-style h1 {
      color: #ffffff;
      font-size: 27px;
      margin-top: 64px;
      text-align: center;
  } 
  </style>
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
        <h3>入居審査用マイページログイン</h3>
      </div>
    </div>

    <!-- Login form -->
    <form action="login" method="POST" id="form-login">
      <div class="from-login">
        <div class="container-fluid">
          <?php if($login_error_msg){?>
            <div class="block-warning" id="warning-error">
              <?php echo $login_error_msg;?>
            </div>
          <?php } ?>
          <div class="block-warning" id="error-section" style="display:none">
            <?php echo __('login.errors.invalid'); ?>
          </div>
          <div class="from-ldpage">
            <div class="content">
              <div class="container-fluid">
                <div class="content-from">
                  <div class="content-from-block">
                    <p class="note">パスワードを忘れた方は<a href="reset_password">こちら</a>
                      </br>会員登録がお済みでない方は<a href="register">こちら</a>
                    </p>
                    <div class="content-from-how">
                      <table class="from">
                        <tbody>
                          <tr>
                            <td class="label-text"><label><?php echo __('user.login.id'); ?></label><n style="color:#6C6C6C; font-family:arial;">(ご登録メールアドレス)</n><span><?php echo __('global.require'); ?></span></td>
                            <td>
                              <div class="block-input">
                                <!-- <input class="w198" type="text" name="" value="" placeholder=""> -->
                                <input class="w198" type="text" name="data[User][email]" value="<?php echo $email;?>" placeholder="" data-placement="right">
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="label-text"><label><?php echo __('global.password'); ?></label><span><?php echo __('global.require'); ?></span></td>
                            <td>
                              <div class="block-input">
                                <!-- <input class="w198" type="text" name="" value="" placeholder=""> -->
                                <input class="w198" type="password" name="data[User][password]" value="" placeholder="" data-placement="right">
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

  <!-- SCRIPT VALIDATION -->
  <script>
    $("#form-login").validate({
      rules: {
        'data[User][email]': {
          required: true,
          email: true
        },
        'data[User][password]': {
          required: true
        }
      },
      messages: {
        'data[User][email]': {
          required: "<?php echo __('user.login.error.email.required'); ?>"
        },
        'data[User][password]': {
          required: "<?php echo __('user.login.error.password.required'); ?>"
        }
      },
      invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
          $("#error-section").show();
          $("#warning-error").hide();
        } else {
          $("#error-section").hide();
        }
      }
    });
    jQuery.extend(jQuery.validator.messages, {
        email: "<?php echo __('global.errors.email'); ?>"
    });
  </script>

  <!-- MENU - FOOTER -->
  <div class="block-menu-footer">
    <?php echo $this->element('menu-footer'); ?>
  </div>
  <!-- END MENU-FOOTER -->
  
  <!-- FOOTER -->
  <footer id="footer-container" class="footer-page">
    <?php echo $this->element('footer'); ?>
  </footer>
  <!-- END FOOTER -->
</body>
</html>