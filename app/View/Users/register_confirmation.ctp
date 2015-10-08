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
            <?php echo $this->Form->create('User', array('action'=>'/register_confirmation', 'id'=>'form')); ?>
              
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
                                <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false))?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
                                <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false))?>
                              </div>
                            </div>
                            <div class="block-input">
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
                                <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false))?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
                                <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false))?>
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
                                    echo $this->Form->radio('gender', array('male'=> __('user.register.male'), 'female'=> __('user.register.female')), array( 'class'=>'radio', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>'male', 'class'=>'fix-pd'));
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
                                $years = array_combine(  range(1930, date("Y")), range(1930, date("Y")));
                                echo $this->Form->select('year_of_birth', $years, array('div'=>false, 'label'=>false, 'id'=>'year', 'onchange'=>'calculate_age()'));
                              ?>
                              <span><?php echo __('user.register.year'); ?></span>
                              <?php 
                                $months = array_combine(range(1, 12), range(1, 12));
                                echo $this->Form->select('month_of_birth', $months, array('div'=>false, 'label'=>false, 'id'=>'month'));
                              ?>
                              <span><?php echo __('user.register.month'); ?></span>
                              <?php 
                                $dates = array_combine(range(1, 31), range(1, 31));
                                  echo $this->Form->select('day_of_birth', $dates, array('div'=>false, 'label'=>false, 'id'=>'day'));
                                ?>
                              <span><?php echo __('user.register.day'); ?></span>
                              <span class="style" id="s-age"></span>
                              <?php echo $this->Form->input('age_of_birth', array('type'=>'hidden', 'id'=>"age", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false, "value"=>$user['User']['age_of_birth']))
                              ?>
                              <script>
                              $('#s-age').html($('#age').val());
                              </script>
                              <span class="style">歳</span>
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
                                    echo $this->Form->radio('married_status_id', $married_statuses, array('label'=>false, 'div'=>false, 'legend'=>false, 'default'=>false, 'class'=>'fix-pd'));
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
                              <?php echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'w40', "placeholder"=>'','div'=>false))
                              ?>
                              <span class="w-auto1">-</span>
                              <?php echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'w80', "placeholder"=>'','div'=>false))
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.pref'); ?></span>
                              <div class="select">
                                <?php 
                                  echo $this->Form->select('UserAddress.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'--------'));
                                ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.city'); ?></span>
                              <?php 
                                  echo $this->Form->input('UserAddress.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198','div'=>false));
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.street'); ?></span>
                              <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198','div'=>false))
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.house'); ?></span>
                              <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false))
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
                                <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false, 'required'=>false))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w43"><?php echo __('user.register.homephone'); ?></span>
                                <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px'))
                                ?>
                              </div>
                            </div>
                            <span class="black">※どちらかひとつ必須</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.email'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'w40 input-style', "placeholder"=>'','div'=>false))
                            ?>    
                            <span class="black1">※ご登録後ユーザーIDとして利用します。</br>普段利用しているメールアドレスを入力ください。</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.confirmemail'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <!-- <input class="w40 input-style" type="text" name="" value="" placeholder="sample@gmail.com"> -->
                            <?php echo $this->Form->input('User.email_confirm', array('type'=>'text', 'id'=>"email_confirm", 'label'=>false, 'class'=>'w40 input-style', "placeholder"=>'','div'=>false,))
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.work'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="select">
                              <?php 
                                echo $this->Form->select('UserCompany.work_id', $works, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'works', 'empty'=>'--------', "value"=>$user['UserCompany']['work_id']));
                              ?>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.experience'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="block-input">
                              <!-- <input class="w40" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'placeholder'=>'', "value"=>$user['UserCompany']['year_worked']))
                              ?>
                              <span class="w-auto1"><?php echo __('user.register.year'); ?></span>
                              <!-- <input class="w40" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'placeholder'=>'', "value"=>$user['UserCompany']['month_worked']))
                              ?>
                              <span class="w-auto1"><?php echo __('user.register.month'); ?></span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.salary_month'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="block-input">
                              <!-- <input class="w108" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.salary_month', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'w108','div'=>false, 'placeholder'=>'', "value"=>$user['UserCompany']['salary_year']))
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
                  <?php $i = 0; foreach ($user['ExpectArea'] as $item) { $i++;?>
                  <div class="content-from-how" id='expect-area-content'>
                    <table class="from">
                      <tbody>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.area') ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <div class="block-input">
                              <span class="w-auto1"><?php echo __('user.register.post'); ?></span>
                              <?php echo $this->Form->input("ExpectArea.$i.post_num_1", array('type'=>'text', 'id'=>"post_num_1",'label'=>false, 'class'=>'w40', "placeholder"=>'','div'=>false))
                              ?>
                              <span class="w-auto1">-</span>
                              <?php echo $this->Form->input("ExpectArea.$i.post_num_2", array('type'=>'text', 'id'=>"post_num_2",  'label'=>false, 'class'=>'w80', "placeholder"=>'','div'=>false))
                              ?>
                              <!-- <a href="#" class="style-link">郵便番号から住所を検索</a> -->
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.pref'); ?></span>
                              <div class="select">
                              <!-- <input class="w198" type="text" name="" value="" placeholder="東京都"> -->
                              <?php 
                                echo $this->Form->select("ExpectArea.$i.pref_id", $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'--------', ));
                              ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.city'); ?></span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="千代田区神田多町"> -->
                              <?php echo $this->Form->input("ExpectArea.$i.city", array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false))
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78"><?php echo __('user.register.street'); ?></span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="1〜4丁目、◯◯◯中学校区"> -->
                              <?php echo $this->Form->input("ExpectArea.$i.address", array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false))
                              ?>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <?php } ?>
                  </section>
  
                <script type="text/javascript">
                  $( document ).ready(function() {
                    $('#form').find(':input:not(:button):not(:disabled):not(:hidden)').prop('disabled',true);
                  });
                </script>

                <div class="block-note">
                  <div class="block-button">
                    <input type="hidden" name="data[User][Confirm]" value="1">
                    <button type="submit"><img src="<?php echo $this->webroot; ?>img/front/link-tab-3.png" alt="変更する"></button>
                    <button type="button" class="link-tab-1b" onclick="window.history.back();"><img src="<?php echo $this->webroot; ?>img/front/link-tab-3b.png" alt="キャンセル"/></button>
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