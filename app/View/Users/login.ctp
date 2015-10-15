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
                            <td class="label-text"><label><?php echo __('user.login.id'); ?></label><span><?php echo __('global.require'); ?></span></td>
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
          required: "<?php echo __('global.errors.required'); ?>"
        },
        'data[User][password]': {
          required: "<?php echo __('global.errors.required'); ?>"
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
</body>
</html>