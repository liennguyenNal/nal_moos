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
                          <td class="label-text"><label>申込人氏名</label><span>必須</span></td>
                          <td>
                            <div class="block-input">
                              <div class="div-style">
                                <span class="w-auto">姓</span>
                                <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'山田','div'=>false))?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto">名</span>
                                <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'雪','div'=>false))?>
                              </div>
                            </div>
                            <div class="block-input">
                              <div class="div-style">
                                <span class="w-auto">セイ</span>
                                <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>'ヤマダ','div'=>false))?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto">メイ</span>
                                <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>'ユキ','div'=>false))?>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>性別</label><span>必須</span></td>
                          <td>
                            <div class="form-radio">
                              <div class="form-w">
                                <div class="block-input-radio">
                                  <?php 
                                    echo $this->Form->radio('gender', array('male'=>"男性"), array('label'=>false, 'legend'=>false, 'default'=>false));
                                  ?>
                                </div>
                                <div class="block-input-radio">
                                  <?php 
                                    echo $this->Form->radio('gender', array('female'=> "女性"), array('label'=>false, 'legend'=>false, 'default'=>false));
                                  ?>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>生年月日</label><span>必須</span></td>
                          <td>
                            <div class="select">
                              <?php 
                                $years = array_combine(  range(1930, date("Y")), range(1930, date("Y")));
                                echo $this->Form->select('year_of_birth', $years, array('div'=>false, 'label'=>false, 'id'=>'year', 'onchange'=>'calculate_age()'));
                              ?>
                              <span>年</span>
                              <?php 
                                $months = array_combine(range(1, 12), range(1, 12));
                                echo $this->Form->select('month_of_birth', $months, array('div'=>false, 'label'=>false, 'id'=>'month'));
                              ?>
                              <span>月</span>
                              <?php 
                                $dates = array_combine(range(1, 31), range(1, 31));
                                  echo $this->Form->select('day_of_birth', $dates, array('div'=>false, 'label'=>false, 'id'=>'day'));
                                ?>
                              <span>日</span>
                              <span class="style" id="s-age"></span>
                              <?php echo $this->Form->input('age_of_birth', array('type'=>'hidden', 'id'=>"age", 'label'=>false, 'class'=>'w198', "placeholder"=>'00','div'=>false, "value"=>$user['User']['age_of_birth']))
                              ?>
                              <script>
                              $('#s-age').html($('#age').val());
                              </script>
                              <span class="style">歳</span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>婚姻</label><span>必須</span></td>
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
                          <td class="label-text"><label>現住所</label><span>必須</span></td>
                          <td>
                            <div class="block-input">
                              <span class="w-auto1">〒</span>
                              <?php echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'w40', "placeholder"=>'101','div'=>false))
                              ?>
                              <span class="w-auto1">-</span>
                              <?php echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'w80', "placeholder"=>'0001','div'=>false))
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78">都道府県</span>
                              <div class="select">
                                <?php 
                                  echo $this->Form->select('UserAddress.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'青森県'));
                                ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <span class="w78">市区町村</span>
                              <?php 
                                  echo $this->Form->input('UserAddress.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198','div'=>false));
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78">番地</span>
                              <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198','div'=>false))
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78">建物</span>
                              <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false))
                              ?>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>婚姻</label><span>必須</span></td>
                          <td>
                            <div class="block-input fix-padding">
                              <div class="div-style">
                                <span class="w78">携帯電話</span>
                                <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', "placeholder"=>'09001234567','div'=>false, 'required'=>false))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w43">自宅</span>
                                <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>false, 'class'=>'w198', "placeholder"=>'0398765432','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px'))
                                ?>
                              </div>
                            </div>
                            <span class="black">※どちらかひとつ必須</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>メールアドレス</label><span>必須</span></td>
                          <td>
                            <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'w40 input-style', "placeholder"=>'sample@gmail.com','div'=>false))
                            ?>    
                            <span class="black1">※ご登録後ユーザーIDとして利用します。</br>普段利用しているメールアドレスを入力ください。</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>メールアドレス（確認）</label><span>必須</span></td>
                          <td>
                            <!-- <input class="w40 input-style" type="text" name="" value="" placeholder="sample@gmail.com"> -->
                            <?php echo $this->Form->input('User.email_confirm', array('type'=>'text', 'id'=>"email_confirm", 'label'=>false, 'class'=>'w40 input-style', "placeholder"=>'sample@gmail.com','div'=>false,))
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>職業</label><span>必須</span></td>
                          <td>
                            <div class="select">
                              <?php 
                                echo $this->Form->select('UserCompany.work_id', $works, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'works', 'empty'=>'正社員', "value"=>$user['UserCompany']['work_id']));
                              ?>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>勤続年数</label><span>必須</span></td>
                          <td>
                            <div class="block-input">
                              <!-- <input class="w40" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'placeholder'=>'00', "value"=>$user['UserCompany']['year_worked']))
                              ?>
                              <span class="w-auto1">年</span>
                              <!-- <input class="w40" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'placeholder'=>'00', "value"=>$user['UserCompany']['month_worked']))
                              ?>
                              <span class="w-auto1">月</span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>税込月収</label><span>必須</span></td>
                          <td>
                            <div class="block-input">
                              <!-- <input class="w108" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.tax_of_month', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w108','div'=>false, 'placeholder'=>'00', "value"=>$user['UserCompany']['tax_of_month']))
                              ?>
                              <span class="w-auto1">円</span>
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
                  <?php $i = 0;foreach ($user['ExpectArea'] as $item) { $i++;?>
                  <div class="content-from-how" id='expect-area-content'>
                    <table class="from">
                      <tbody>
                        <tr>
                          <td class="label-text"><label>希望エリア1</label><span>必須</span></td>
                          <td>
                            <div class="block-input">
                              <span class="w-auto1">〒</span>
                              <?php echo $this->Form->input("ExpectArea.$i.post_num_1", array('type'=>'text', 'id'=>"post_num_1",'label'=>false, 'class'=>'w40', "placeholder"=>'101','div'=>false))
                              ?>
                              <span class="w-auto1">-</span>
                              <?php echo $this->Form->input("ExpectArea.$i.post_num_2", array('type'=>'text', 'id'=>"post_num_2",  'label'=>false, 'class'=>'w80', "placeholder"=>'0001','div'=>false))
                              ?>
                              <!-- <a href="#" class="style-link">郵便番号から住所を検索</a> -->
                            </div>
                            <div class="block-input">
                              <span class="w78">都道府県</span>
                              <div class="select">
                              <!-- <input class="w198" type="text" name="" value="" placeholder="東京都"> -->
                              <?php 
                                echo $this->Form->select("ExpectArea.$i.pref_id", $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'青森県', ));
                              ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <span class="w78">市区町村</span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="千代田区神田多町"> -->
                              <?php echo $this->Form->input("ExpectArea.$i.city", array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198', "placeholder"=>'千代田区神田多町','div'=>false))
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78">地域</span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="1〜4丁目、◯◯◯中学校区"> -->
                              <?php echo $this->Form->input("ExpectArea.$i.address", array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198', "placeholder"=>'1〜4丁目、◯◯◯中学校区','div'=>false))
                              ?>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <?php } ?>
                  </section>

                <div class="block-note">
                  <div class="block-button">
                    <input type="hidden" name="data[User][Confirm]" value="1">
                    <button type="button" onclick="window.history.back();">キャンセル</button>
                    <button type="submit">変更する</button>
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