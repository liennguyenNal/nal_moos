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
                <?php echo $this->Form->create("User", array('action'=>'change_password', 'id' => 'form-change-password')) ?>
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

    $("#form-change-password").validate({
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
          required: "<?php echo __('user.setting_password.error.password'); ?>"
        },
        'data[User][confirm_password]': {
          required: "<?php echo __('user.setting_password.error.password_confirm'); ?>"
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


