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
            <?php echo $this->Form->create('User', array('action'=>'/register')); ?>
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
                                <!-- <input class="w198" type="text" name="" value="" placeholder="山田"> -->
                                <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'山田','div'=>false))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto">名</span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="太郎"> -->
                                <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'雪','div'=>false))
                                ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <div class="div-style">
                                <span class="w-auto">セイ</span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="ヤマダ"> -->
                                <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>'ヤマダ','div'=>false))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w-auto">メイ</span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="タロウ"> -->
                                <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', "placeholder"=>'ユキ','div'=>false))
                                ?>
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
                                    echo $this->Form->radio('gender', array('male'=>"男性",'female'=> "女性"), array( 'class'=>'radio', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>'male', 'class'=>'fix-pd'));
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
                                $years = array_combine(range(1930, date("Y")), range(1930, date("Y")));
                                echo $this->Form->select('year_of_birth', $years, array('id'=>'year', 'onchange'=>'calculate_age()'));
                              ?>
                              <span>年</span>
                              <?php 
                                $months = array_combine(range(1, 12), range(1, 12));
                                echo $this->Form->select('month_of_birth', $months, array('id'=>'month'));
                              ?>
                              <span>月</span>
                              <?php 
                                $dates = array_combine(range(1, 31), range(1, 31));
                                echo $this->Form->select('day_of_birth', $dates, array('id'=>'day'));
                              ?>
                              <span>日</span>
                              <!-- <span class="style">（00歳）</span> -->
                              <span class="style" id="s-age">0</span>
                              <?php echo $this->Form->input('age_of_birth', array('type'=>'hidden', 'id'=>"age", 'label'=>false, 'class'=>'w198', "placeholder"=>'00','div'=>false))
                              ?>
                              <span class="style">歳</span>
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
                              <?php 
                                echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'w40', "placeholder"=>'101','div'=>false))
                              ?>
                              <span class="w-auto1">-</span>
                              <?php 
                                echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'w80', "placeholder"=>'0001','div'=>false))
                              ?>
                              <a href="javascript:void(0)" type="button" class="style-link" id="btn-find-expect-address" onclick="javascript:find_address($(this));">郵使番号から住所を検索</a>
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
                              <span class="w78">都道府県</span>
                              <div class="select">
                              <!-- <input class="w198" type="text" name="" value="" placeholder="東京都"> -->
                              <?php 
                                echo $this->Form->select('UserAddress.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'青森県'));
                              ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <span class="w78">市区町村</span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="千代田区神田多町"> -->
                              <?php 
                                echo $this->Form->input('UserAddress.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'placeholder'=>'千代田区神田多町'));
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78">番地</span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="2-5-1"> -->
                              <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198','div'=>false, 'placeholder'=>'2-5-1'))
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78">建物</span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="神田ビルディング2001号"> -->
                              <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'神田ビルディング2001号','div'=>false))
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
                                <!-- <input class="w198" type="text" name="" value="" placeholder="09012345678"> -->
                                <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', "placeholder"=>'09012345678','div'=>false, 'required'=>false))
                                ?>
                              </div>
                              <div class="div-style">
                                <span class="w43">自宅</span>
                                <!-- <input class="w198" type="text" name="" value="" placeholder="0312345678"> -->
                                <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>false, 'class'=>'w198', "placeholder"=>'0312345678','div'=>false))
                                ?>
                              </div>
                            </div>
                            <span class="black">※どちらかひとつ必須</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>メールアドレス</label><span>必須</span></td>
                          <td>
                            <!-- <input class="w40 input-style" type="text" name="" value="" placeholder="sample@gmail.com"> -->
                            <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'w40 input-style', "placeholder"=>'sample@gmail.com','div'=>false))
                            ?>    
                            <span class="black1">※ご登録後ユーザーIDとして利用します。</br>普段利用しているメールアドレスを入力ください。</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>メールアドレス（確認）</label><span>必須</span></td>
                          <td>
                            <!-- <input class="w40 input-style" type="text" name="" value="" placeholder="sample@gmail.com"> -->
                            <?php echo $this->Form->input('User.email_confirm', array('type'=>'text', 'id'=>"email_confirm", 'label'=>false, 'class'=>'w40 input-style', "placeholder"=>'sample@gmail.com','div'=>false))
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>職業</label><span>必須</span></td>
                          <td>
                            <div class="select">
                              <?php 
                                echo $this->Form->select('UserCompany.work_id', $works, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'works', 'empty'=>'正社員'));
                              ?>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="label-text"><label>勤続年数</label><span>必須</span></td>
                          <td>
                            <div class="block-input">
                              <!-- <input class="w40" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'placeholder'=>'00'))
                              ?>
                              <span class="w-auto1">年</span>
                              <!-- <input class="w40" type="text" name="" value="" placeholder="00"> -->
                              <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'placeholder'=>'00'))
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
                              <?php echo $this->Form->input('UserCompany.tax_of_month', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w108','div'=>false, 'placeholder'=>'00'))
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
                  <div class="content-from-how" id='expect-area-content'>
                    <table class="from">
                      <tbody>
                        <tr>
                          <td class="label-text"><label>希望エリア1</label><span>必須</span></td>
                          <td>
                            <div class="block-input">
                              <span class="w-auto1">〒</span>
                              <!-- <input class="w40" type="text" name="" value="" placeholder="101"> -->
                              <?php echo $this->Form->input('ExpectArea.1.post_num_1', array('type'=>'text', 'id'=>"post_num_1",'label'=>false, 'class'=>'w40', "placeholder"=>'101','div'=>false))
                              ?>
                              <span class="w-auto1">-</span>
                              <!-- <input class="w80" type="text" name="" value="" placeholder="0000"> -->
                              <?php echo $this->Form->input('ExpectArea.1.post_num_2', array('type'=>'text', 'id'=>"post_num_2",  'label'=>false, 'class'=>'w80', "placeholder"=>'0000','div'=>false))
                              ?>
                              <!-- <a href="#" class="style-link">郵便番号から住所を検索</a> -->
                              <a href="javascript:void(0)" type="button" class="style-link" id="btn-find-expect-address" onclick="javascript:find_address($(this));">郵使番号から住所を検索</a>
                            </div>
                            <div class="block-input">
                              <span class="w78">都道府県</span>
                              <div class="select">
                              <!-- <input class="w198" type="text" name="" value="" placeholder="東京都"> -->
                              <?php 
                                echo $this->Form->select('ExpectArea.1.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'青森県'));
                              ?>
                              </div>
                            </div>
                            <div class="block-input">
                              <span class="w78">市区町村</span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="千代田区神田多町"> -->
                              <?php echo $this->Form->input('ExpectArea.1.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198', "placeholder"=>'千代田区神田多町','div'=>false))
                              ?>
                            </div>
                            <div class="block-input">
                              <span class="w78">地域</span>
                              <!-- <input class="w198" type="text" name="" value="" placeholder="1〜4丁目、◯◯◯中学校区"> -->
                              <?php echo $this->Form->input('ExpectArea.1.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198', "placeholder"=>'1〜4丁目、◯◯◯中学校区','div'=>false))
                              ?>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  </section>

                  <div class="link-form" id='remove' style="display:none">
                    <a href="javascript:void(0)" class="style-link" id='btn-remove' style="display: inline-block; background-color: #5f421e; color: #fff; padding: 5px 15px; border-radius: 3px; margin-left: 19px;" onclick="javascript:_remove($(this));"> - 希望エリアを追加</a>
                  </div>

                  <div class="link-form">
                    <!-- <a href="#">希望エリアを追加</a> -->
                    <a href="javascript:void(0)" class="style-link" id='btn-add' style="display: inline-block; background-color: #5f421e; color: #fff; padding: 5px 15px; border-radius: 3px; margin-left: 19px;"> + 希望エリアを追加</a>
                  </div>
                  
                  <!-- Script add new area -->
                  <script type="text/javascript">
                    $(this).autoKana('#first_name', '#first_name_kana', {katakana:false, toggle:false});
                    $(this).autoKana('#last_name', '#last_name_kana', {katakana:false, toggle:false});


                    var num_area = 1;

                    var order_object = 2;
                    function replaceAll(find, replace, str) {
                      return str.replace(new RegExp(find, 'g'), replace);
                    }
                    
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
                      // body...
                      num_area--; 
                      //alert(obj.parent().parent().html());
                      obj.parent().remove();
                    }

                    $('#btn-add').on('click', function() {
                      if( num_area < 5 ){
                       var area = $('#expect-area-content').clone(true, true);
                       

                       area.html(area.html().replace(/\[1\]/g, '['+ order_object + ']' ));
                       order_object++;
                       
                        area.append($('#remove').clone(true, true).html());
                       
                        $('#expect-area').append(area);
                        num_area++;
                      }
                      else {
                        alert('Cannot add more item');
                      }
                    });

                  $(function() {
                    $( "#dialog-message" ).dialog({
                      autoOpen : false,
                      modal: true,
                      buttons: {
                        Ok: function() {
                          $( this ).dialog( "close" );
                        }
                      }
                    });

                    $( "#form" ).submit(function( event ) {
                      if( $( "#agree" ).is(':checked') ){
                        

                      }
                      else {
                       
                        $( "#dialog-message" ).dialog("open");
                        event.preventDefault();
                      }
                    });
                  });
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
                          echo $this->Form->input('User.agree',array('type'=>'checkbox','options'=>array(1),'div'=>false, 'id'=>'agree','label'=>false));
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