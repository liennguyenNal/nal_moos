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
  <script src="<?php echo $this->webroot; ?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/jquery.validate.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/jquery-validate.bootstrap-tooltip.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/swiper.jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/common.js" type="text/javascript"></script>
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
          <h3>パスワード設定</h3>
        </div>
      </div>
      <div class="from-login">
        <div class="container-fluid">
          <div class="from-ldpage">
            <div class="content">
              <div class="container-fluid">
                <div class="content-from">
                  <div class="block-warning" id="error-section" style="display:none">
                    <?php echo __('global.errors.create.password'); ?>
                  </div>
                  <?php echo $this->Form->create("User", array('action'=>'create_password', 'id' => 'form-create-password')) ?>
                    <div class="content-from-block">
                      <div class="content-from-how">
                        <table class="from">
                          <tbody>
                            <tr>
                              <td class="label-text"><label>パスワード</label><span>必須</span></td>
                              <td>
                                <div class="block-input fix-padding">
                                  <div class="div-style">
                                    <!-- <input disabled class="w198" type="text" name="" value="※半角英数字、8文字以上" placeholder=""> -->
                                    <?php echo $this->Form->input('password', array('type'=>'password', 'id'=>"password", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false, 'data-placement' => 'right'))?>
                                    <span class="style">※半角英数字、8文字以上</span>
                                    
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="label-text"><label>パスワード（確認）</label><span>必須</span></td>
                              <td>
                                <div class="block-input fix-padding">
                                  <div class="div-style">
                                    <!-- <input class="w198" type="text" name="" value="" placeholder=""> -->
                                    <?php echo $this->Form->input('confirm_password', array('type'=>'password', 'id'=>"confirm_password", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false, 'data-placement' => 'right'))?>
                                    <span class="style">※半角英数字、8文字以上</span>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php echo $this->Form->hidden('email');?>
                            <?php echo $this->Form->hidden('access_token');?>
                          </tbody>
                        </table>
                      </div>
                      <p class="note note-fix">※パスワードは、半角英数（a-z）、数字（0-9）、及びピリオド（.）、アンダースコア（_）、ダッシュ（-）を使用することができます。</br>アルファベットと数字を混在させてください。先頭の文字はアルファベットまたは数字にしてください。ピリオドを連続して使用することはできません。</p>
                      <div class="block-note">
                        <div class="block-button">
                          <button type="submit"><img src="<?php echo $this->webroot; ?>img/front/text-from-a.png" alt="送信する"/></button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="block-menu-footer">
    <div class="container-fluid">
      <ul>
        <li><a href="#">家賃でもらえる家とは</a></li>
        <li><a href="#">申し込みの流れ</a></li>
        <li><a href="<?php echo $this->webroot; ?>faq">よくある質問</a></li>
        <li><a href="#">仮審査申し込み</a></li>
        <li><a href="<?php echo $this->webroot; ?>contact">お問い合わせ</a></li>
        <li><a href="#">運営会社</a></li>
        <li><a href="#">個人情報保護方針</a></li>
      </ul>
    </div>
  </div>
  <footer id="footer-container" class="footer-page">
    <div class="container-fluid">   
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <img src="<?php echo $this->webroot; ?>img/front/footer.png" alt=""/>
          <p>Copyright © RENESYS All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- SCRIPT VALIDATION -->
  <script>
    $.validator.addMethod(
      "password_regex",
      function(value, element, regexp) {
          var re = new RegExp(regexp);
          return this.optional(element) || re.test(value);
      },
      "必須項目です。</br>半角英数字で入力してください。</br>8文字以上で入力してください。"
    );

    $.validator.addMethod("nospace", 
      function(value, element) { 
        return value.indexOf(" ") < 0 && value != ""; 
      }, "スペースは入力しないでください。");

    $("#form-create-password").validate({
      rules: {
        'data[User][password]': {
          required: true,
          password_regex: "^[a-z0-9_.-]",
          nospace: true,
          minlength: 8
        },
        'data[User][confirm_password]': {
          required: true,
          equalTo: "#password"
        }
      },
      messages: {
        'data[User][password]': {
          required: "<?php echo __('global.errors.create_password.password'); ?>"
        },
        'data[User][confirm_password]': {
          required: "<?php echo __('global.errors.create_password.confirm_password'); ?>"
        }
      },
      invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
          $("#error-section").show();
        } else {
          $("#error-section").hide();
        }
      }
    });
    jQuery.extend(jQuery.validator.messages, {
      password: "<?php echo __('global.errors.password'); ?>",
      equalTo: "<?php echo __('global.errors.equalTo.password'); ?>",
      minlength: "<?php echo __('global.errors.password.minlength'); ?>"
    });
  </script>
</body>
</html>


