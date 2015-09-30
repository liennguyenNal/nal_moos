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
              <?php echo $this->Form->create("Contact", array('action'=>'index')); ?>
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
                                <!-- <input class="w198" type="text" name="" value="" placeholder="山田"> -->
                                <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'山田','div'=>false))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="太郎"> -->
                                <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'雪','div'=>false))
                                ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="ヤマダ"> -->
                                <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>'ヤマダ','div'=>false))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="タロウ"> -->
                                <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>'ユキ','div'=>false))
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
                                  <!-- <input type="radio" name="sex" value="1" id="1"><label for="1">男性</label> -->
                                  <?php 
                                    echo $this->Form->radio('type', array('1'=> __('user.contact.customer'), '2'=> __('user.contact.marketing'), '3' => __('user.contact.constructure'), '4' => __('global.other')), array( 'class'=>'radio', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>false, 'class'=>'fix-pd'));
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
                              <!-- <input class="w198" type="text" name="" value="" placeholder=""> -->
                              <?php echo $this->Form->input('company', array('type'=>'text', 'id'=>"comapny_name", 'label'=>false, 'class'=>'w198', 'div'=>false))
                              ?>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.contact.company-phone'); ?></label><span>必須</span></td>
                          <td>
                            <div class="block-input fix-padding">
                              <div class="div-style">
                                <span class="w78"><?php echo __('user.register.mobiphone'); ?></span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="09012345678"> -->
                                <?php echo $this->Form->input('phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198', 'div'=>false, 'placeholder'=>'09012345678'))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w43"><?php echo __('user.register.homephone'); ?></span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="0312345678"> -->
                                <?php echo $this->Form->input('phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198', 'div'=>false, 'placeholder'=>'0312345678'))
                                ?>
                              </div>
                            </div>
                            <span class="black">※どちらかひとつ必須</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.email'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <!-- <input class="w40 input-style" type="text" name="" value="" placeholder="sample@gmail.com"> -->
                            <?php echo $this->Form->input('email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'w40 input-style', 'div'=>false, 'placeholder'=>'sample@gmail.com'))
                            ?>
                            <span class="black1">※ご登録後ユーザーIDとして利用します。</br>普段利用しているメールアドレスを入力ください。</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.register.confirmemail'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <!-- <input class="w40 input-style" type="text" name="" value="" placeholder="sample@gmail.com"> -->
                            <?php echo $this->Form->input('email_confirm', array('type'=>'text', 'id'=>"email_confirm", 'label'=>false, 'class'=>'w40 input-style', 'div'=>false, 'placeholder'=>'sample@gmail.com'))
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label><?php echo __('user.contact.content'); ?></label><span><?php echo __('global.require'); ?></span></td>
                          <td>
                            <!-- <textarea rows="4" cols="50"></textarea> -->
                            <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'rows'=>4, 'cols'=> 50, 'div'=>false))
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
                          echo $this->Form->input('agree',array('type'=>'checkbox','options'=>array("1"=>"1"),'div'=>false, 'label'=>false));
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
                  $(this).autoKana('#first_name', '#first_name_kana', {katakana:false, toggle:false});
                  $(this).autoKana('#last_name', '#last_name_kana', {katakana:false, toggle:false});
                </script>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>