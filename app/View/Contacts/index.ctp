<section id="content-container">
  <div class="menu-sup-page">
    <div class="container-fluid">
      <ul>
        <li><a href="#">トップページ</a></li>
        <li><span>お問い合わせ</span></li>
      </ul>
    </div>
  </div>
  <div class="title-sup-page">
    <div class="container-fluid">
      <h3>お問い合わせフォーム</h3>
    </div>
  </div>
  <div class="from-login">
    <div class="container-fluid">
      <div class="from-ldpage">
        <div class="content">
          <div class="container-fluid">
            <div class="content-from">
              <?php echo $this->element('flash');?>
              <div class="block-warning" id="error-section" style="display:none">
                <?php echo __('global.errors'); ?>
              </div>
              <?php echo $this->Form->create("Contact", array('action'=>'index', 'id' => 'form-contact')); ?>
                <div class="content-from-block">
                  <!-- <p class="note">パスワードを忘れた方は<a href="#">こちら</a></br>会員登録がお済みでない方は<a href="#">こちら</a></p> -->
                  <div class="content-from-how">
                    <table class="from">
                      <tbody>
                        <tr>
                          <td class="label-text">
                            <label><?php echo __('user.contact.username'); ?></label><span><?php echo __('global.require'); ?></span>
                          </td>
                          <td>
                            <div class="block-input">
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.firstname'); ?></span>
                                <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>false, 'class'=>'w198', "placeholder"=>"例）山田",'div'=>false, 'data-placement' => 'right'))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
                                <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>false, 'class'=>'w198', "placeholder"=>"太郎",'div'=>false, 'data-placement' => 'right'))
                                ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
                                <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>"ヤマダ",'div'=>false, 'data-placement' => 'right'))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
                                <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>"タロウ",'div'=>false, 'data-placement' => 'right'))
                                ?>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.contact.type-company'); ?></label><span>必須</span></td>
                          <td>
                            <div class="form-radio">
                              <div class="form-w">
                                <div class="block-input-radio">
                                  <?php 
                                    echo $this->Form->radio('type', array('1'=> __('user.contact.customer'), '2'=> __('user.contact.marketing'), '3' => __('user.contact.constructure'), '4' => __('global.other')), array( 'class'=>'radio', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>false, 'class'=>'fix-pd', 'required'=>false, 'data-placement' => 'right'));
                                  ?>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.contact.company-name'); ?></label></td>
                          <td>
                            <div class="block-input">
                              <?php echo $this->Form->input('company', array('type'=>'text', 'id'=>"comapny_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false))
                              ?>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.contact.company-phone'); ?></label><span>必須</span></td>
                          <td>
                              <?php echo $this->Form->input('phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w40', 'div'=>false, 'placeholder'=>"例）09012345678", 'required'=>false, 'data-placement' => 'right'))
                              ?>
                            <span class="black1">※”-”ハイフンなしで入力してください。</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.email'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <?php echo $this->Form->input('email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'w40 input-style', 'div'=>false, 'required'=>false, 'data-placement' => 'right', 'placeholder'=>"例）sample@gmail.com"))
                            ?>
                            <span class="black1">※ご登録後ユーザーIDとして利用します。</br>普段利用しているメールアドレスを入力ください。</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.confirmemail'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <?php echo $this->Form->input('email_confirm', array('type'=>'text', 'id'=>"email_confirm", 'label'=>false, 'class'=>'w40 input-style', 'div'=>false,  'required'=>false, 'data-placement' => 'right', 'placeholder'=>"sample@gmail.com"))
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.contact.content'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'rows'=>4, 'cols'=> 50, 'div'=>false, 'required'=>false, 'data-placement' => 'right'))
                            ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="block-note">
                    <p>個人情報の取り扱いについて</p>
                    <form>
                      <div class="block-input-radio">
                        ◯ ご記入いただきました個人情報は、本申込書に関するお客様へのご連絡、商品の情報提供、弊社が主催・実施する個別相談会・イベント情報などをご提供する場合に使用させていただきます。 また、これらの個人情報は、適切な安全対策のもと管理しております。</label>
                      </div>
                      <div class="block-input-radio">
                        ◯ 原則としてお客様の同意なく第三者へ開示・提供いたしません。</label>
                      </div>
                      <div class="block-input-radio">
                        ◯ 個人情報の取り扱いについて同意いただけない場合は、上記のサービスが受けられなくなる場合があります。</label>
                      </div>
                    </form>
                    <span class="span">上記内容に同意いただける方は、下記にチェックを入れ送信確認へお進みください。</span>
                    <div class="block-button">
                      <div class="block-input-check">
                        <div class="block">
                          <!-- <input type="checkbox" name="sex" value="1" id="8"> -->
                          <?php
                          echo $this->Form->input('agree',array('type'=>'checkbox','options'=>array("1"=>"1"),'div'=>false, 'label'=>false, 'id' => 'agree', 'data-placement' => 'right'));
                          ?>
                          <label for="8">上記内容に同意します。</label>
                        </div>
                        <span class="red">※必須</span>
                      </div>
                      <!-- <button type="button"><img src="img/front/contact.png" alt="送信確認"/></button> -->
                      <button type="submit"><img src="<?php echo $this->webroot; ?>img/front/contact.png" alt="送信確認"/></button>
                    </div>
                  </div>
                </div>
                <script type="text/javascript">
                  $(this).autoKana('#first_name', '#first_name_kana', {katakana:true, toggle:false});
                  $(this).autoKana('#last_name', '#last_name_kana', {katakana:true, toggle:false});
                </script>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SCRIPT VALIDATION -->
<script>
  $.validator.addMethod(
    "phone_number",
    function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    },
    "携帯電話を正しく入力してください。"
  );
  $("#form-contact").validate({
    rules: {
      'data[Contact][first_name]':{ required: true },
      'data[Contact][first_name_kana]':{ required: true },
      'data[Contact][last_name]':{ required: true },
      'data[Contact][last_name_kana]':{ required: true },
      'data[Contact][type]': { required: true },
      'data[Contact][phone]': {
        required: {
          depends:  function() {
            return !$("#home_phone").val();
          }
        },
        number: true,
        maxlength: 11,
        phone_number: "^0[0-9]"
      },
      'data[Contact][home_phone]': {
        required: {
          depends:  function() {
            return !$("#phone").val();
          }
        },        
        number: true,
        maxlength: 10,
        phone_number: "^0[0-9]"
      },
      'data[Contact][email]': { required: true, email: true },
      'data[Contact][email_confirm]': { required: true, equalTo: '#email' },
      'data[Contact][content]': { required: true },
      'data[Contact][agree]': { required: true },
    },
    messages: {
      'data[Contact][first_name]': { required: "<?php echo __('global.errors.firstname'); ?>" },
      'data[Contact][first_name_kana]': { required: "<?php echo __('global.errors.firstnamekana'); ?>" },
      'data[Contact][last_name]': { required: "<?php echo __('global.errors.lastname'); ?>" },
      'data[Contact][last_name_kana]':{ required: "<?php echo __('global.errors.lastnamekana'); ?>" },
      'data[Contact][type]': { required: "<?php echo __('global.errors.contact_type'); ?>" },
      'data[Contact][phone]': { 
        required: "<?php echo __('global.errors.contact.phone'); ?>",
        maxlength: "<?php echo __('global.errors.maxlength_11'); ?>"
         },
      'data[Contact][home_phone]': { 
        required: "<?php echo __('global.errors.required'); ?>",
        maxlength: "<?php echo __('global.errors.maxlength_10'); ?>"
         },
      'data[Contact][email]': { required: "<?php echo __('global.errors.contact.email'); ?>" },
      'data[Contact][email_confirm]': { required: "<?php echo __('global.errors.contact.confirm_email'); ?>" },
      'data[Contact][content]': { required: "<?php echo __('global.errors.contact.content'); ?>" },
      'data[Contact][agree]': { required: "<?php echo __('global.errors.required_checkbox'); ?>" },
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
      email: "<?php echo __('global.errors.email'); ?>",
      equalTo: "<?php echo __('global.errors.equalTo'); ?>",
      number: "<?php echo __('global.errors.number'); ?>"
  });

  $('#phone').on('change', function() {
    $('#home_phone').valid(); 
  });
  $('#home_phone').on('change', function() {
    $('#phone').valid(); 
  });

</script>