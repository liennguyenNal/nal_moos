<section id="content-container">
  <div class="menu-sup-page">
    <div class="container-fluid">
      <ul>
        <li><a href="#">トップページ</a></li>
        <li><span>無料会員登録</span></li>
      </ul>
    </div>
  </div>
  <div class="title-sup-page-style style-a">
    <div class="container-fluid">
      <h3>無料会員登録</h3>
    </div>
  </div>
  <div class="title-clause">
    <div class="container-fluid">
      <h4>営業活動は一切ありません。</h4>
      <p>以下のメールフォームより会員登録をお願いいたします。</p>
    </div>
  </div>

  <!-- Start form -->
  <div class="from-login">
    <div class="container-fluid">
      <div class="from-ldpage">
        <div class="content">
          <div class="container-fluid">
            <div class="content-from">
              <?php echo $this->element('flash'); ?>
              <div class="block-warning" id="error-section" style="display:none">
                <?php echo __('global.errors'); ?>
              </div>
              <?php echo $this->Form->create('User', array('action'=>'/register', 'id' => 'form-register', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after', 'error'=>false)))); ?>
                <div class="content-from-block">
                  <div class="content-from-how">
                    <table class="from">
                      <tbody>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.username'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="block-input">
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.firstname'); ?></span>
                                <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>false, 'class'=>'w198', "placeholder"=>"山田",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="太郎"> -->
                                <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>false, 'class'=>'w198', "placeholder"=>"太郎",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                                ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="ヤマダ"> -->
                                <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>"ヤマダ",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="タロウ"> -->
                                <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>"タロウ",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                                ?>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.gender'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="form-radio">
                              <div class="form-w">
                                <div class="block-input-radio">
                                  <?php 
                                    echo $this->Form->radio('gender', array('male'=> __('user.register.male'), 'female'=> __('user.register.female')), array( 'class'=>'radio', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>'male', 'class'=>'fix-pd', 'data-placement' => 'right', 'required'=>false));
                                  ?>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.birthday'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="select">
                              <?php 
                                $years = array_combine(range(1900, date("Y")), range(1900, date("Y")));
                                echo $this->Form->select('year_of_birth', $years, array('id'=>'year', 'onchange'=>'calculate_age()', 'data-placement' => 'right', 'required'=>false, 'empty'=>'----'));
                              ?>
                              <span><?php echo __('user.register.year'); ?></span>
                              <?php 
                                $months = array_combine(range(1, 12), range(1, 12));
                                echo $this->Form->select('month_of_birth', $months, array('id'=>'month', 'data-placement' => 'right', 'required'=>false, 'empty'=>'--'));
                              ?>
                              <span><?php echo __('user.register.month'); ?></span>
                              <?php 
                                $dates = array_combine(range(1, 31), range(1, 31));
                                echo $this->Form->select('day_of_birth', $dates, array('id'=>'day', 'data-placement' => 'right', 'required'=>false, 'empty'=>'--'));
                              ?>
                              <span><?php echo __('user.register.day'); ?></span>
                              <!-- <span class="style">（00歳）</span> -->
                              <span class="style" id="s-age">0</span>
                              <?php echo $this->Form->input('age_of_birth', array('type'=>'hidden', 'id'=>"age", 'label'=>false, 'class'=>'w198', "placeholder"=>'00','div'=>false, 'required'=>false))
                              ?>
                              <span class="style"><?php echo __('user.register.age'); ?></span>
                              <!-- Script tinh tuoi -->
                              <script type="text/javascript">
                                function calculate_age(){
                                  var d = new Date();
                                  var n = d.getFullYear();
                                  $("#s-age").html(n - $("#year").val());
                                  $("#age").val(n - $("#year").val());
                                }
                              </script>
                              <!-- End script -->
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.married'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="form-radio">
                              <div class="form-w">
                                <div class="block-input-radio">
                                  <?php 
                                    echo $this->Form->radio('married_status_id', $married_statuses, array('label'=>false, 'div'=>false, 'legend'=>false, 'default'=>false, 'class'=>'fix-pd', 'data-placement' => 'right', 'default'=>1, 'required'=>false));
                                  ?> 
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.address'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="block-input">
                              <span class="w-auto1"><?php echo __('user.register.post'); ?></span>
                              <?php 
                                echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'w40', "placeholder"=>"101",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                              ?>
                              <span class="w-auto1">-</span>
                              <?php 
                                echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'w80', "placeholder"=>"0000",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                              ?>
                              <a href="javascript:void(0)" type="button" class="style-link" id="btn-find-expect-address" onclick="javascript:find_address($(this));"><?php echo __('user.register.findaddress'); ?></a>
                              <!-- Script tim dia chi buu dien -->
                              <script type="text/javascript">
                                function find_address(obj){
                                 var p =  obj.parent().parent().parent();
                                 var zip_code = p.find("input[id*='post_num_1']").val().trim() + p.find("input[id*='post_num_2']").val().trim();
                                    
                                  $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: zip_code}, 
                                    function(json) {
                                      p.find("select[id*='pref_id']").val(json.pref_id);
                                      p.find("input[id*='city']").val(json.ward);
                                      p.find("input[id*='address']").val(json.addr1);
                                  });
                              }
                              </script>
                              <!-- End script -->
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.pref'); ?></span>
                              <div class="select">
                              <!-- <input class="w198" type="text" name="" value="" placeholder="東京都"> -->
                              <?php 
                                echo $this->Form->select('UserAddress.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'--------', 'data-placement' => 'right', 'required'=>false));
                              ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.city'); ?></span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="千代田区神田多町"> -->
                              <?php 
                                echo $this->Form->input('UserAddress.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'placeholder'=>"千代田区神田多町", 'data-placement' => 'right', 'required'=>false, 'maxlength'=>false));
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.street'); ?></span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="2-5-1"> -->
                              <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198','div'=>false, 'placeholder'=>"2-5-1", 'data-placement' => 'right', 'required'=>false))
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.house'); ?></span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="神田ビルディング2001号"> -->
                              <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'w198', "placeholder"=>"神田ビルディング2001号",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                              ?>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.phone'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="block-input fix-padding">
                              <div class="div-style">
                                <span class="w78"><?php echo __('user.register.mobiphone'); ?></span>
                                <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', "placeholder"=>"09012345678",'div'=>false, 'required'=>false, 'data-placement' => 'right'))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w43"><?php echo __('user.register.homephone'); ?></span>
                                <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>false, 'class'=>'w198', "placeholder"=>"0312345678",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                                ?>
                              </div>
                            </div>
                            <span class="black">※どちらかひとつ必須</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.email'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'w40 input-style', "placeholder"=>"sample@gmail.com",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                            ?>    
                            <span class="black1">※ご登録後ユーザーIDとして利用します。</br>普段利用しているメールアドレスを入力ください。</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.confirmemail'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <?php echo $this->Form->input('User.email_confirm', array('type'=>'text', 'id'=>"email_confirm", 'label'=>false, 'class'=>'w40 input-style', "placeholder"=>"sample@gmail.com",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.work'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="select">
                              <?php 
                                echo $this->Form->select('UserCompany.work_id', $works, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'works', 'empty'=>'--------', 'data-placement' => 'right', 'required'=>false));
                              ?>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.experience'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="block-input">
                              <!-- <input class="w40" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'placeholder'=>"00", 'data-placement' => 'right', 'required'=>false))
                              ?>
                              <span class="w-auto1"><?php echo __('user.register.year'); ?></span>
                              <!-- <input class="w40" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'placeholder'=>"00", 'data-placement' => 'right', 'required'=>false))
                              ?>
                              <span class="w-auto1"><?php echo __('user.register.month'); ?></span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.tax'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="block-input">
                              <!-- <input class="w108" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.salary_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'w108','div'=>false, 'placeholder'=>"00", 'data-placement' => 'right', 'required'=>false))
                              ?>
                              <span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
                            </div>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="content-from-title fix">
                    <h2>ご希望エリア</h2>
                    <span>※最大5エリアまで／※選択条件によりご希望に添えない場合がございます。</span>
                  </div>
                  <section id="expect-area">
                  <div class="content-from-how" id='expect-area-content'>
                    <table class="from">
                      <tbody>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.area') ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="block-input">
                              <span class="w-auto1"><?php echo __('user.register.post'); ?></span>
                              <?php echo $this->Form->input('ExpectArea.1.post_num_1', array('type'=>'text', 'id'=>"post_num_1",'label'=>false, 'class'=>'w40 post_num_1', "placeholder"=>"101",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                              ?>
                              <span class="w-auto1">-</span>
                              <?php echo $this->Form->input('ExpectArea.1.post_num_2', array('type'=>'text', 'id'=>"post_num_2",  'label'=>false, 'class'=>'w80', "placeholder"=>"0000",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                              ?>
                              <a href="javascript:void(0)" type="button" class="style-link" id="btn-find-expect-address" onclick="javascript:find_address($(this));"><?php echo __('user.register.findaddress'); ?></a>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.pref'); ?></span>
                              <div class="select">
                              <?php 
                                echo $this->Form->select('ExpectArea.1.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'--------', 'data-placement' => 'right', 'required'=>false));
                              ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.city'); ?></span>
                              <?php echo $this->Form->input('ExpectArea.1.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198', "placeholder"=>"千代田区神田多町",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.street'); ?></span>
                              <?php echo $this->Form->input('ExpectArea.1.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198', "placeholder"=>"1〜4丁目、◯◯◯中学校区",'div'=>false, 'data-placement' => 'right', 'required'=>false))
                              ?>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  </section>

                  <div class="link-form style">
                      <div class="block-link">
                          <a href="javascript:void(0)" class="style-link" id='btn-add'><?php echo __('user.register.add'); ?></a>
                      </div>
                  </div>

                  <section id="remove" style="display:none">
                      <div class="link-form style" >
                          <div class="block-link">
                              <a href="javascript:void(0)" class="style-link" id='btn-remove' onclick="javascript:_remove($(this));"><?php echo __('user.register.remove'); ?></a>
                          </div>
                      </div>
                  </section>
                  
                  <!-- Script add new area -->
                  <script type="text/javascript">
                    $(this).autoKana('#first_name', '#first_name_kana', {katakana:true, toggle:false});
                    $(this).autoKana('#last_name', '#last_name_kana', {katakana:true, toggle:false});

                    function find_address(obj){
                       var p =  obj.parent().parent().parent();
                       var zip_code = p.find("input[id*='post_num_1']").val().trim() + p.find("input[id*='post_num_2']").val().trim();
                       var loader = p.find("div[id*='loader']");
                            
                          loader.show();
                          
                        $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: zip_code}, 
                          function(json) {
                            loader.hide();
                            //alert(p.find("select[id*='pref_id']").val());
                            p.find("select[id*='pref_id']").val(json.pref_id);
                            p.find("input[id*='city']").val(json.ward);
                            p.find("input[id*='address']").val(json.addr1);
                        });
                    }

                    function _remove (obj) {
                        num_area--; 
                        obj.parent().parent().parent().remove();
                        $('#btn-add').show();
                    }

                </script>
                <!-- End script -->

                <div class="block-note">
                  <p>個人情報の取り扱いについて</p>
                  <div class="block-input-radio">
                    ◯ ご記入いただきました個人情報は、本申込書に関するお客様へのご連絡、商品の情報提供、弊社が主催・実施する個別相談会・イベント情報などをご提供する場合に使用させていただきます。 また、これらの個人情報は、適切な安全対策のもと管理しております。</label>
                  </div>
                  <div class="block-input-radio">
                    ◯ 原則としてお客様の同意なく第三者へ開示・提供いたしません。</label>
                  </div>
                  <div class="block-input-radio">
                    ◯ 個人情報の取り扱いについて同意いただけない場合は、上記のサービスが受けられなくなる場合があります。</label>
                  </div>
                  <span class="span">上記内容に同意いただける方は、下記にチェックを入れ送信確認へお進みください。</span>
                  <div class="block-button">
                    <div class="block-input-check">
                      <div class="block">
                        <!-- <input type="checkbox" name="sex" value="1" id="8"> -->
                        <?php
                          echo $this->Form->input('User.agree',array('type'=>'checkbox','options'=>array(1),'div'=>false, 'id'=>'agree','label'=>false, 'data-placement' => 'right'));
                        ?>
                        <label for="8">上記内容に同意します。</label>
                      </div>
                      <span class="red">※必須</span>
                    </div>
                    <!-- <button type="button"><img src="img/front/contact.png" alt="送信確認"/></button> -->
                    <button type="submit"><img src="<?php echo $this->webroot; ?>img/front/button-01.png" alt="送信確認"/></button>
                  </div>
                </div>
              </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SCRIPT VALIDATION -->
<script>
  var num_area = 1;
  var order_object = 2;

  function replaceAll(find, replace, str) {
    return str.replace(new RegExp(find, 'g'), replace);
  }
  $('#btn-add').on('click', function() {
    if( num_area < 5 ){
      var area = $('#expect-area-content').clone(true, true);
      area.html(area.html().replace(/\[1\]/g, '['+ order_object + ']' ));
      area.prepend($('#remove').clone(true, true).html());
      $('#expect-area').append(area);
      $('#form-register').validate();
      $("[id^='post_num_1']").each(function() {
          $(this).rules("add", 
          { 
            required: true,
            minlength: 3,
            maxlength: 3,
            messages: {
              required: "<?php echo __('global.errors.required'); ?>",
              minlength: "<?php echo __('global.errors.minlength_3'); ?>",
              maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
            }
          });
      });
      $("[id^='post_num_2']").each(function() {
          $(this).rules("add", 
          { 
            required: true,
            minlength: 4,
            maxlength: 4,
            messages: {
              required: "<?php echo __('global.errors.required'); ?>",
              minlength: "<?php echo __('global.errors.minlength_4'); ?>",
              maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
            }
          });
      });
      $("[id^='pref_id']").each(function() {
          $(this).rules("add", 
          { 
            required: true,
            messages: {
              required: "<?php echo __('global.errors.required'); ?>"
            }
          });
      });
      $("[id^='city']").each(function() {
          $(this).rules("add", 
          { 
            required: true,
            messages: {
              required: "<?php echo __('global.errors.required'); ?>"
            }
          });
      });
      $("[id^='address']").each(function() {
          $(this).rules("add", 
          { 
            required: true,
            messages: {
              required: "<?php echo __('global.errors.required'); ?>"
            }
          });
      });
      order_object++;
      num_area++;
      if(num_area == 5){
        $('#btn-add').hide();
      }
    }
    else {
      alert('Cannot add more item');
    }
  });

  $.validator.addMethod( "phone_number",
    function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    },
    "携帯電話を正しく入力してください。"
  );

  $.validator.addMethod("nospace", 
    function(value, element) { 
      return value.indexOf(" ") < 0 && value != ""; 
    }, "スペースは入力しないでください。");

  $("#form-register").validate({
      rules: {
        'data[User][first_name]': {
          required: true,
          nospace: true
        },
        'data[User][last_name]': {
          required: true,
          nospace: true
        },
        'data[User][first_name_kana]': {
          required: true,
          nospace: true
        },
        'data[User][last_name_kana]': {
          required: true,
          nospace: true
        },
        'data[User][gender]': {required: true},
        'data[User][year_of_birth]': {required: true},
        'data[User][month_of_birth]': {required: true},
        'data[User][day_of_birth]': {required: true},
        'data[User][married_status_id]': {required: true},
        'data[UserAddress][post_num_1]': {
          required: true,
          number: true,
          minlength: 3,
          maxlength: 3
        },
        'data[UserAddress][post_num_2]': {
          required: true,
          number: true,
          minlength: 4,
          maxlength: 4
        },
        'data[UserAddress][pref_id]': {required: true},
        'data[UserAddress][city]': {required: true},
        'data[UserAddress][address]': {required: true},
        'data[User][phone]': {
          required: function(element) {
            return !$("#home_phone").val();
          },
          number: true,
          maxlength: 11,
          phone_number: "^0[0-9]"
        },
        'data[User][home_phone]': {
          required: function(element) {
             return  !$("#phone").val();
          },
          number: true,
          maxlength: 10,
          phone_number: "^0[0-9]"
        },
        'data[User][email]': { 
          required: true, 
          email: true 
        },
        'data[User][email_confirm]': {
          required: true, 
          equalTo: '#email'
        },
        'data[UserCompany][work_id]': {required: true},
        'data[UserCompany][year_worked]': {
          required: true,
          number: true
        },
        'data[UserCompany][month_worked]': {
          required: true,
          number: true,
          min: 0,
          max: 11
        },
        'data[UserCompany][salary_year]': {
          required: true,
          number: true
        },
        'data[ExpectArea][1][post_num_1]': {
          required: true,
          number: true,
          minlength: 3,
          maxlength: 3
        },
        'data[ExpectArea][1][post_num_2]': {
          required: true,
          number: true,
          minlength: 4,
          maxlength: 4
        },
        'data[ExpectArea][1][pref_id]': {required: true},
        'data[ExpectArea][1][city]': {required: true},
        'data[ExpectArea][1][address]': {required: true},
        'data[User][agree]': {required: true}
      },
      messages: {
        'data[User][first_name]': {required: "<?php echo __('global.errors.firstname'); ?>"},
        'data[User][last_name]': {required: "<?php echo __('global.errors.lastname'); ?>"},
        'data[User][first_name_kana]': {required: "<?php echo __('global.errors.firstnamekana'); ?>"},
        'data[User][last_name_kana]': {required: "<?php echo __('global.errors.lastnamekana'); ?>"},
        'data[User][gender]': {required: "<?php echo __('global.errors.gender'); ?>"},
        'data[User][married_status_id]': {required: "<?php echo __('global.errors.gender'); ?>"},
        'data[User][year_of_birth]': {required: "<?php echo __('global.errors.birthday'); ?>"},
        'data[User][month_of_birth]': {required: "<?php echo __('global.errors.birthday'); ?>"},
        'data[User][day_of_birth]': {required: "<?php echo __('global.errors.birthday'); ?>"},
        'data[User][married_status_id]': {required: "<?php echo __('global.errors.married'); ?>"},
        'data[UserAddress][post_num_1]': {
          required: "<?php echo __('global.errors.post_num_1'); ?>",
          minlength: "<?php echo __('global.errors.minlength_3'); ?>",
          maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
        },
        'data[UserAddress][post_num_2]': {
          required: "<?php echo __('global.errors.post_num_2'); ?>",
          minlength: "<?php echo __('global.errors.minlength_4'); ?>",
          maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
        },
        'data[UserAddress][pref_id]': {required: "<?php echo __('global.errors.pref'); ?>"},
        'data[UserAddress][city]': {required: "<?php echo __('global.errors.city'); ?>"},
        'data[UserAddress][address]': {required: "<?php echo __('global.errors.address'); ?>"},
        'data[User][phone]': { 
          required: "<?php echo __('global.errors.phone'); ?>",
          maxlength: "<?php echo __('global.errors.maxlength_11'); ?>"
        },
        'data[User][home_phone]': { 
          required: "<?php echo __('global.errors.required'); ?>",
          maxlength: "<?php echo __('global.errors.maxlength_10'); ?>"
        },
        'data[User][email]': {required: "<?php echo __('global.errors.register.email'); ?>"},
        'data[User][email_confirm]': {required: "<?php echo __('global.errors.register.confirm_email'); ?>"},
        'data[UserCompany][work_id]': {required: "<?php echo __('global.errors.work_id'); ?>"},
        'data[UserCompany][year_worked]': {required: "<?php echo __('global.errors.year_worked'); ?>"},
        'data[UserCompany][month_worked]': {
          required: "<?php echo __('global.errors.year_worked'); ?>",
          min: "<?php echo __('global.errors.month.min'); ?>",
          max: "<?php echo __('global.errors.month.max') ?>"
        },
        'data[UserCompany][salary_year]': {required: "<?php echo __('global.errors.salary_year'); ?>"},
        'data[ExpectArea][1][post_num_1]': {
          required: "<?php echo __('global.errors.post_num_1'); ?>",
          minlength: "<?php echo __('global.errors.minlength_3'); ?>",
          maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
        },
        'data[ExpectArea][1][post_num_2]': {
          required: "<?php echo __('global.errors.post_num_2'); ?>",
          minlength: "<?php echo __('global.errors.minlength_4'); ?>",
          maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
        },
        'data[ExpectArea][1][pref_id]': {required: "<?php echo __('global.errors.pref'); ?>"},
        'data[ExpectArea][1][city]': {required: "<?php echo __('global.errors.city'); ?>"},
        'data[ExpectArea][1][address]': {required: "<?php echo __('global.errors.address'); ?>"},
        'data[User][agree]': {required: "<?php echo __('global.errors.required_checkbox'); ?>"}
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
</script>





