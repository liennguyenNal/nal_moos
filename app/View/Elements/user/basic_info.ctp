  <script src="<?php echo $this->webroot; ?>js/autoNumeric.js"></script>
<div class="from-login">
    <div class="from-ldpage">
      <div class="content">
        <div class="content-from">
          <div class="title-tab title-tab-fix-mb">
            <h3>申込人基本情報</h3>
          </div>
          <!-- FORM -->
          <?php echo $this->element('flash_success');?>
            <div class="block-warning" id="error-section" style="display:none">
                <?php echo __('global.errors'); ?>
            </div>
          <?php echo $this->Form->create("User", array('action'=>'update_basic_info','id'=>'UserEditBasicInfo','inputDefaults' => array('format' => array('before', 'label', 'between', 'input', 'after', 'error'=>false ) ))) ?>
            <div class="content-from-block">
              <div class="content-from-how">
                <table class="from" id="theform">
                  <tbody>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.register.username'); ?></label><span><?php echo __('global.require'); ?></span></td>
                      <td>
                        <div class="block-input">
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.firstname'); ?></span>
                            <?php echo $this->Form->input('User.first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement' => 'right', 'required'=>false, 'placeholder'=>'山田'))
                            ?>
                          </div>
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
                            <?php echo $this->Form->input('User.last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement' => 'right', 'required'=>false, 'placeholder'=>'太郎'))
                            ?>
                          </div>
                        </div>
                        <div class="block-input">
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
                            <?php echo $this->Form->input('User.first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement' => 'right', 'required'=>false, 'placeholder'=>'ヤマダ'))
                            ?>
                          </div>
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
                            <?php echo $this->Form->input('User.last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement' => 'right', 'required'=>false, 'placeholder'=>'タロウ'))
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.register.gender') ?></label><span><?php echo __('global.require'); ?></span></td>
                      <td>
                        <div class="form-radio">
                          <div class="form-w">
                            <div class="block-input-radio">
                            <?php 
                                echo $this->Form->radio('User.gender', array('male'=>__('user.register.male'),'female'=> __('user.register.female')), array( 'class'=>'radio', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"female", 'class'=>'fix-pd', 'data-placement' => 'right', 'required'=>false));
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
                                echo $this->Form->select('year_of_birth', $years, array('id'=>'year', 'onchange'=>'calculate_age()', 'data-placement' => 'right', 'empty'=>'----', 'required'=>false));
                            ?>
                          <span><?php echo __('user.register.year'); ?></span>
                            <?php 
                                $months = array_combine(range(1, 12), range(1, 12));
                                echo $this->Form->select('month_of_birth', $months, array('id'=>'month', 'data-placement' => 'right', 'empty'=>'--', 'required'=>false, 'onchange'=>'calculate_age()'));
                            ?>
                          <span><?php echo __('user.register.month'); ?></span>
                            <?php 
                                $dates = array_combine(range(1, 31), range(1, 31));
                                echo $this->Form->select('day_of_birth', $dates, array('id'=>'day', 'data-placement' => 'right', 'empty'=>'--', 'required'=>false, 'onchange'=>'calculate_age()'));
                            ?>
                          <span><?php echo __('user.register.day'); ?></span>
                          <span class="style" id="age">0</span>
                          <span class="style"><?php echo __('user.register.age'); ?></span>
                            <!-- Script tinh tuoi -->
                            <script type="text/javascript">
                                calculate_age();
                                function calculate_age(){
                                  // var d = new Date();
                                  // var n = d.getFullYear();
                                  // $("#s-age").html(n - $("#year").val());
                                  // $("#age").val(n - $("#year").val());
                                  if($("#year").val() && $("#month").val() && $("#day").val()){
                                  
                                    age = calculateAge($("#year").val(), $("#month").val(), $("#day").val() );

                                  }
                                  else {
                                    age = "";
                                  }

                                  $("#age").html(age);

                                }
                                function calculateAge(birthYear, birthMonth, birthDay)
                                {
                                  todayDate = new Date();
                                  todayYear = todayDate.getFullYear();
                                  todayMonth = todayDate.getMonth();
                                  todayDay = todayDate.getDate();
                                  age = todayYear - birthYear; 

                                  if (todayMonth < birthMonth - 1)
                                  {
                                    age--;
                                  }

                                  if (birthMonth - 1 == todayMonth && todayDay < birthDay)
                                  {
                                    age--;
                                  }
                                  return age;
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
                                    echo $this->Form->radio('married_status_id', $married_statuses, array('label'=>false, 'div'=>false, 'legend'=>false, 'default'=>false, 'class'=>'fix-pd', 'data-placement' => 'right', 'required'=>false));
                                ?> 
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.my_page.basic_info.family'); ?></label><span><?php echo __('global.require'); ?></span></td>
                      <td>
                        <div class="form-radio">
                          <div class="form-w">
                            <div class="block-input-radio">
                                <?php 
                                    echo $this->Form->radio('User.live_with_family', array(1=>__('user.my_page.basic_info.have_family') ,0=>__('user.my_page.basic_info.alone')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'data-placement' => 'right', 'required'=>false, 'default'=>"1"));
                                ?> 
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.my_page.basic_info.num_children'); ?></span></td>
                      <td>
                        <div class="block-input">
                          <?php echo $this->Form->input('User.num_child', array('type'=>'text', 'id'=>"num_child", 'label'=>false, 'class'=>'w40', 'div'=>false, 'data-placement' => 'right', 'required'=>false, 'placeholder'=>'00'))
                          ?>
                          <span class="w-auto1"><?php echo __('user.my_page.basic_info.person'); ?></span>
                        </div>
                      </td>
                    </tr>  
                  </tbody>
                </table>
              </div>
            </div>
          <div class="title-tab title-tab-fix-mb title-tab-fix-mt">
            <h3>申込人住所情報</h3>
          </div>
            <div class="content-from-how">
              <table class="from">
                <tbody>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.address'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <span class="w-auto1"><?php echo __('user.register.post'); ?></span>
                        <?php 
                            echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'w40', "placeholder"=>'101','div'=>false, 'data-placement' => 'right', 'required'=>false))
                        ?>
                        <span class="w-auto1">-</span>
                        <?php 
                            echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'w80', "placeholder"=>'0000','div'=>false, 'data-placement' => 'right', 'required'=>false))
                        ?>
                        <a class="style-link" type="button" id="btn-find-address"><?php echo __('user.register.findaddress'); ?></a>
                          <!-- Script tim dia chi buu dien -->
                          <script type="text/javascript">
                        $('#btn-find-address').on('click', function() {
                            $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#post_num_1').val().trim() + $('#post_num_2').val().trim()}, 
                              function(json) {
                                $("#pref_id").val(json.pref_id);
                                $("#city").val(json.ward);
                                $("#address").val(json.addr1);
                            });
                        });
                      </script>
                          <!-- End script -->
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.pref'); ?></span>
                        <div class="select">
                            <?php 
                                echo $this->Form->select('UserAddress.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'--------', 'data-placement' => 'right', 'required'=>false));
                            ?>
                        </div>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.city'); ?></span>
                        <?php 
                            echo $this->Form->input('UserAddress.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'placeholder'=>'千代田区神田多町', 'data-placement' => 'right', 'required'=>false, 'maxlength'=>false));
                        ?>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.street'); ?></span>
                        <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198','div'=>false, 'placeholder'=>'2-14-17', 'data-placement' => 'right', 'required'=>false))
                        ?>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.house'); ?></span>
                        <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'グレイス高輪ビル８階','div'=>false, 'data-placement' => 'right', 'required'=>false))
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.residence'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="select">
                        <?php echo $this->Form->select('UserAddress.residence_id', $residences, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'residence_id', 'data-placement'=>'right', 'empty'=>'--------', 'required'=>false, 'onchange'=>'change_residence()')); 

                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.year_residence'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserAddress.year_residence', array('type'=>'text', 'id'=>"year_residence",'label'=>false, 'class'=>'w40','div'=>false, 'data-placement'=>'right', "required"=>false, 'placeholder'=>'00'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.year'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.house_cost'); ?></label><span id="house_cost_required" style="display:none"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserAddress.housing_costs', array('type'=>'text', 'id'=>"housing_costs",'label'=>false, 'class'=>'w108','div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'000,000'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <script type="text/javascript">
                  load_required_label_house_cost();
                  function load_required_label_house_cost(){                    
                    if($("#residence_id"). val() == 1 || $("#residence_id"). val() == 2){
                      $("#house_cost_required").hide();
                    }
                    else {
                      $("#house_cost_required").show();
                    }
                  }
                  </script>
                </tbody>
              </table>
              
              <script  type="text/javascript" >
                  var residence_id = $('#residence_id').val();
                  if(residence_id == 1 || residence_id == 2){
                    $("#house_cost_required").hide();
                  }
                  else { 
                     $("#house_cost_required").show();
                  }

                  function change_residence(){
                    residence_id = $('#residence_id').val();
                    if(residence_id == 1 || residence_id == 2){
                      $("#house_cost_required").hide();
                    }
                    else { 
                       $("#house_cost_required").show();
                    }
                  }

              </script>
              <?php echo $this->Form->hidden('UserAddress.id')?>
            </div>

          <div class="title-tab title-tab-fix-mb title-tab-fix-mt">
            <h3>申込人連絡先情報</h3>
          </div>
          
            <div class="content-from-how">
              <table class="from">
                <tbody>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.contact.company-phone'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input fix-padding">
                        <div class="div-style">
                          <span class="w78"><?php echo __('user.register.mobiphone'); ?></span>
                          <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'09012345678'))
                          ?>
                        </div>
                        <div class="div-style">
                          <span class="w43"><?php echo __('user.register.homephone'); ?></span>
                          <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>false, 'class'=>'w198','div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'0312345678'))
                          ?>
                        </div>
                      </div>
                      <span class="black">※どちらかひとつ必須。”-”ハイフンなしで入力してください。</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.email'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                        <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'w40 input-style', 'div'=>false, 'required'=>false, 'disabled'=>'true', 'placeholder'=>'sample@gmail.com'))
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.contact_type'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="form-radio">
                        <div class="form-w">
                          <div class="block-input-radio">
                            <?php 
                                echo $this->Form->radio('User.contact_type', array('1'=>__('user.register.mobiphone'),'2'=>__('user.my_page.basic_info.home_phone'),'3'=>__('user.my_page.basic_info.work_phone')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'data-placement'=>'right', 'required'=>false, 'default'=>'1'));
                            ?>  
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          
          <div class="title-tab title-tab-fix-mb title-tab-fix-mt">
            <h3>申込人勤務先情報</h3>
          </div>
         
            <div class="content-from-how">
              <table class="from">
                <tbody>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.work'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="select">
                        <?php 
                            echo $this->Form->select('UserCompany.work_id', $works, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'work_id', 'empty'=>'--------', 'data-placement'=>'right', 'required'=>false, 'onchange'=>'show_company_required_field()'));
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.company'); ?></label><span id="company_required_label_0"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.my_page.basic_info.company_name'); ?></span>
                        <?php echo $this->Form->input('UserCompany.name', array('type'=>'text', 'id'=>"b_company_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'例）株式会社ヤチンデモラエル'))
                        ?>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.my_page.basic_info.company_name_kana'); ?></span>
                        <?php echo $this->Form->input('UserCompany.name_kana', array('type'=>'text', 'id'=>"b_company_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'カブシキガイシャヤチンデモラエル'))
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.basic_info.company'); ?></label><span id="company_required_label_1"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <span class="w-auto1"><?php echo __('user.register.post'); ?></span>
                        <?php echo $this->Form->input('UserCompany.post_num_1', array('type'=>'text', 'id'=>"company_post_num_1", 'label'=>false, 'class'=>'w40', 'div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'101'))
                        ?>
                        <span class="w-auto1">-</span>
                        <?php echo $this->Form->input('UserCompany.post_num_2', array('type'=>'text', 'id'=>"company_post_num_2", 'label'=>false, 'class'=>'w80', 'div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'0000'))
                        ?>
                      <a type="button" class="style-link" id="btn-find-company-address"><?php echo __('user.register.findaddress'); ?></a>
                          <!-- Script -->
                          <!-- <button type="button" class="btn btn-primary" id="btn-find-company-address">郵使番号から住所を検索</button> -->
                      <script type="text/javascript">
                        $('#btn-find-company-address').on('click', function() {
                            $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#company_post_num_1').val().trim() + $('#company_post_num_2').val().trim()}, 
                              function(json) {
                                $("#company_pref_id").val(json.pref_id);
                                $("#company_city").val(json.ward);
                                $("#company_address").val(json.addr1);
                            });
                        });
                      </script>
                          <!-- End script -->
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.pref'); ?></span>
                        <div class="select">
                            <?php 
                              echo $this->Form->select('UserCompany.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'company_pref_id', 'empty'=>'--------', 'data-placement'=>'right', 'required'=>false));
                            ?>
                        </div>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.city'); ?></span>
                        <?php 
                            echo $this->Form->input('UserCompany.city', array('type'=>'text', 'id'=>"company_city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right', 'required'=>false, 'maxlength'=>false, 'placeholder'=>'千代田区神田多町'));
                        ?>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.street'); ?></span>
                        <?php echo $this->Form->input('UserCompany.address', array('type'=>'text', 'id'=>"company_address", 'label'=>false, 'class'=>'w198','div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'2-14-17'))
                        ?>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.house'); ?></span>
                        <?php echo $this->Form->input('UserCompany.house_name', array('type'=>'text', 'id'=>"company_house_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'グレイス高輪ビル８階'))
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.contact.company-phone'); ?></label><span id="company_required_label_2"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input fix-padding">
                        <div class="div-style">
                          <?php echo $this->Form->input('UserCompany.phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'例）09012345678'))
                          ?>
                          <span class="style">※”-”ハイフンなしで入力してください。</span>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.fax'); ?></label><span id="company_required_label_3"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input fix-padding">
                        <div class="div-style">
                          <?php echo $this->Form->input('UserCompany.fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'例）0312345678'))
                          ?>
                          <span class="style">※”-”ハイフンなしで入力してください。</span>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.career'); ?></label><span id="company_required_label_4"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="select">
                        <?php echo $this->Form->select('UserCompany.career_id', $careers, array('class'=>'w198','div'=>false, 'label'=>false, 'id'=>'carrer_id', 'empty'=>'--------', 'data-placement'=>'right', 'required'=>false));
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.description'); ?></label><span id="company_required_label_5"><?php echo __('global.require'); ?></span></td>
                    <td>
                        <?php echo $this->Form->input('UserCompany.description', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'例）病院での薬剤師(医療事務)業務、建設会社での営業(設土木作業)業務など'))
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.department'); ?></label><span id="company_required_label_6"><?php echo __('global.require'); ?></span></td>
                    <td>
                        <?php echo $this->Form->input('UserCompany.department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'例）営業部 第一営業課'))
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.position'); ?></label><span id="company_required_label_7"><?php echo __('global.require'); ?></span></td>
                    <td>
                        <?php echo $this->Form->input('UserCompany.position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'例）部長、課長、次長、係長、主任など'))
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.experience'); ?></label><span id="company_required_label_8"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"year_worked", 'label'=>false, 'class'=>'w40', 'div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'00'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.year'); ?></span>
                        <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"month_worked", 'label'=>false, 'class'=>'w40', 'div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'00'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.landing-page.month'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_type'); ?></label><span id="company_required_label_9"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="form-radio">
                        <div class="form-w">
                          <div class="block-input-radio">
                            <?php 
                                echo $this->Form->radio('UserCompany.salary_type', array('1'=>__('user.my_page.basic_info.salary_fix'),'2'=>__('user.my_page.basic_info.salary_bonus'), '3'=>__('user.my_page.basic_info.salary_product'), "4"=>__('global.other')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'id'=>'salary_type', 'onchange'=>'change_type($(this))', 'data-placement'=>'right', 'required'=>false));
                            ?>
                            <script type="text/javascript">
                                function change_type(obj){
                                    if(obj.val() == '4')
                                      $('#salary_type_other').prop('disabled',false);
                                    else {
                                      $('#salary_type_other').val("").prop('disabled',true);
                                    }
                                }
                            </script>  
                          </div>
                            <?php 
                                echo $this->Form->input('UserCompany.salary_type_other', array('type'=>'text', 'id'=>"salary_type_other", 'label'=>false, 'class'=>'w40 input-style fix-pd','div'=>false, 'disabled'=> $user['UserCompany']['salary_type'] == 4? false: true , 'data-placement'=>'right', 'required'=>false, 'style'=>'width: 100px'))
                            ?>
                        </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.tax'); ?></label><span id="company_required_label_10"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserCompany.salary_month', array('type'=>'text', 'id'=>"salary_month", 'label'=>false, 'class'=>'w108','div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'000,000'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_year'); ?></label><span id="company_required_label_11"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserCompany.salary_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'w108','div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'000,000'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.my_page.basic_info.salary_man'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_receive'); ?></label><span id="company_required_label_12"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="form-radio">
                        <div class="form-w">
                          <div class="block-input-radio">
                            <?php 
                                echo $this->Form->radio('UserCompany.salary_receive_id', array('1'=>__('user.my_page.basic_info.salary_day'),'2'=>__('user.my_page.basic_info.salary_week'), '3'=>__('user.my_page.basic_info.salary_month')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"3", 'data-placement'=>'right', 'required'=>false, 'id'=>'salary_receive', 'onchange'=>'change_type_date($(this))')); 
                            ?>
                          </div>
                          <script type="text/javascript">
                              function change_type_date(obj){
                                  if(obj.val() == '3')
                                  $('#salary_date').prop('disabled',false);
                                  else {
                                    $('#salary_date').val("").prop('disabled',true);
                                  }
                              }
                          </script>
                          <div class="style-a">
                            <label for="11"><?php echo __('user.my_page.basic_info.salary_date'); ?></label>
                            <?php
                                echo $this->Form->input('UserCompany.salary_date', array('type'=>'text', 'id'=>"salary_date", 'label'=>false, 'class'=>'w40','div'=>false, 'data-placement'=>'right', 'placeholder'=>'25', 'required'=>false, 'disabled'=> $user['UserCompany']['salary_receive_id'] != 3)) 
                            ?>
                            <label for="11"><?php echo __('global.date'); ?></label>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.insurances'); ?></label><span id="company_required_label_13"><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="select">
                        <?php 
                            echo $this->Form->select('UserCompany.insurance_id', $insurances, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------', 'data-placement'=>'right', 'required'=>false));
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.note'); ?></label></td>
                    <td>
                      <span class="black style">※派遣社員の方は派遣先、出向中の方は出向先、入社6ヶ月以下の方は前職の情報を入力ください。</br>※未就業（職業が専業主婦／主夫、無職、その他の方）で収入がある場合、詳細な情報を記載ください。</span>
                      <?php echo $this->Form->input('UserCompany.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'div'=>false, 'data-placement'=>'right', 'rows'=>4, 'cols'=>50, 'required'=>false))
                      ?>
                    </td>
                  </tr>
                  <?php echo $this->Form->hidden('UserCompany.id')?>
                </tbody>
              </table>
            </div>
          <script type="text/javascript">
                show_company_required_field();
               //function check required
               function show_company_required_field(){
                  var work_id = $("#work_id").val();
                  if(work_id){
                    var work = new Array(13, 13);
                 
                    work[1] =  Array(1, 1, 1, 0, 1, 1 , 1, 0, 1, 1, 1, 1, 1, 1);
                    work[2] =  Array(1, 1, 1, 0, 1, 1 , 1, 1, 1, 1, 1, 1, 1, 1);
                    work[3] =  Array(1, 1, 1, 0, 1, 1 , 1, 0, 1, 1, 1, 1, 1, 1);
                    work[4] =  Array(1, 1, 1, 0, 1, 1 , 1, 0, 1, 1, 1, 1, 1, 1);
                    work[5] =  Array(0, 1, 1, 0, 1, 1 , 0, 0, 1, 1, 1, 1, 1, 1);
                    work[6] =  Array(1, 1, 1, 0, 1, 1 , 1, 0, 1, 1, 1, 1, 1, 1);
                    work[7] =  Array(1, 1, 1, 0, 1, 1 , 0, 0, 1, 1, 1, 1, 1, 1);               
                    work[8] =  Array(0, 0, 0, 0, 0, 0 , 0, 0, 0, 0, 0, 0, 0, 1);
                    work[9] =  Array(0, 0, 0, 0, 0, 0 , 0, 0, 0, 0, 1, 1, 0, 1);
                    work[10] = Array(0, 0, 0, 0, 0, 0 , 0, 0, 0, 0, 0, 0, 0, 1);
                    work[11] = Array(0, 0, 0, 0, 0, 0 , 0, 0, 0, 0, 0, 0, 0, 1);
                    for(i=0; i< work[work_id].length; i++){
                      if(work[work_id][i] == 0){
                        $("#company_required_label_"+i).hide();

                      }
                      else $("#company_required_label_"+i).show();
                    }
                  }
                  else {
                    for(i=0; i< 14; i++){
                      
                        $("#company_required_label_"+i).hide();

                        
                    }
                    $("#company_required_label_13").show();
                  }
               }
          </script>
          <div class="title-tab title-tab-fix-mb title-tab-fix-mt">
            <h3><?php echo __('user.my_page.basic_info.debt'); ?></h3>
          </div>
          
            <div class="content-from-how">
              <table class="from">
                <tbody>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.debt_count'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('User.debt_count', array('type'=>'text', 'id'=>"debt_count", 'label'=>false, 'class'=>'w40 style', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'0'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.my_page.basic_info.count'); ?></span>
                        <span class="style">※借り入れがない場合 "0” を入力してください。</span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.debt_total'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('User.debt_total_value', array('type'=>'text', 'id'=>"debt_total", 'label'=>false, 'class'=>'w40 style', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'0'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.my_page.basic_info.salary_man'); ?></span>
                        <span class="style">※借り入れがない場合 "0” を入力してください。</span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.debt_month'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('User.debt_pay_per_month', array('type'=>'text', 'id'=>"debt_month", 'label'=>false, 'class'=>'w40 style', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'0'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
                        <span class="style">※借り入れがない場合 "0” を入力してください。</span>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
         
          <div class="title-tab title-tab-fix-mb title-tab-fix-mt">
            <h3>申込人希望エリア</h3>
          </div>
          <section id="expect-area">
          <?php $i = 0; foreach($user['ExpectArea'] as $item){ $i++;?>
                <div class="content-from-how" id="expect-area-content-<?php echo $i; ?>">
                <?php if( $i > 1 ) {?>
                     <div class="link-form style" >
                        <div class="block-link">
                            <a href="javascript:void(0)" class="style-link" id='btn-remove' onclick="javascript:_remove($(this));">- 希望エリアを削除</a>
                        </div>
                    </div>
                <?php }?>
                  <table class="from">
                    <tbody>
                      <tr>
                        <td class="label-text">
                            <label><?php echo __('user.register.area') ?></label>
                            <span><?php echo __('global.require'); ?></span>
                        </td>
                        <td>
                          <div class="block-input">
                            <span class="w-auto1"><?php echo __('user.register.post'); ?></span>
                            <?php echo $this->Form->input("ExpectArea.$i.post_num_1", array('type'=>'text', 'id'=>"post_num_1_" . $i,'label'=>false, 'class'=>'w40', 'div'=>false, 'value'=>$item['post_num_1'], 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'101'))
                            ?>
                            <span class="w-auto1">-</span>
                            <?php echo $this->Form->input("ExpectArea.$i.post_num_2", array('type'=>'text', 'id'=>"post_num_2_" . $i,  'label'=>false, 'class'=>'w80', 'div'=>false, 'value'=>$item['post_num_2'], 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'0000'))
                            ?>
                            <a href="javascript:void(0)" type="button" class="style-link" id="btn-find-expect-address" onclick="javascript:find_area_address($(this));"><?php echo __('user.register.findaddress'); ?></a>
                          </div>
                          <div class="block-input">
                            <span class="w78"><?php echo __('user.register.pref'); ?></span>
                            <div class="select">
                                <?php echo $this->Form->select("ExpectArea.$i.pref_id", $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id' . $i, 'empty'=>'--------', 'value'=>$item['pref_id'], 'required'=>false, 'data-placement'=>'right'));
                                ?>
                            </div>
                          </div>
                          <div class="block-input">
                            <span class="w78"><?php echo __('user.register.city'); ?></span>
                            <?php echo $this->Form->input("ExpectArea.$i.city", array('type'=>'text', 'id'=>"city". $i, 'label'=>false, 'class'=>'w198','div'=>false, 'value'=>$item['city'], 'required'=>false, 'data-placement'=>'right', 'maxlength'=>false, 'placeholder'=>'港区高輪'))
                            ?>
                          </div>
                          <div class="block-input">
                            <span class="w78"><?php echo __('user.register.area.street'); ?></span>
                            <?php echo $this->Form->input("ExpectArea.$i.address", array('type'=>'text', 'id'=>"address". $i, 'label'=>false, 'class'=>'w198', 'div'=>false, 'value'=>$item['address'], 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'2丁目'))
                            ?>
                            <?php echo $this->Form->hidden("ExpectArea.$i.id", array('value'=>$item['id']))?>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              <?php } ?>
          </section>

            <div class="link-form style">
                <div class="block-link">
                    <a href="javascript:void(0)" class="style-link" id='btn-add'><?php echo __('user.register.add'); ?></a>
                </div>
            </div>

            <section id="remove" style="display:none">
                <div class="link-form" >
                    <div class="block-link">
                        <a href="javascript:void(0)" class="style-b" id='btn-remove' onclick="javascript:_remove($(this));"><?php echo __('user.register.remove'); ?></a>
                    </div>
                </div>
            </section>

          <?php echo $this->Form->hidden('User.id')?>
            <!-- SCRIPT -->
            <script type="text/javascript">
                $(this).autoKana('#first_name', '#first_name_kana', {katakana:true, toggle:false});
                $(this).autoKana('#last_name', '#last_name_kana', {katakana:true, toggle:false});
                $(this).autoKana("#b_company_name", "#b_company_name_kana", {katakana:true, toggle:false});
                function find_area_address(obj){
                  //alert('find_area_address');
                   var p =  obj.parent().parent();
                   //alert(p.html());
                   var zip_code = p.find("input[id*='post_num_1']").val().trim() + p.find("input[id*='post_num_2']").val().trim();
                      
                    $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: zip_code}, 
                      function(json) {
                        p.find("select[id*='pref_id']").val(json.pref_id);
                        p.find("input[id*='city']").val(json.ward);
                        p.find("input[id*='address']").val(json.addr1);
                    });
                }
              </script>
              <!-- END SCRIPT -->
        <?php echo $this->Form->hidden('User.is_confirm', array('value'=> 1, 'id'=>'user-info-id'))?>
        <?php if($user['User']['status_id'] == 2){?>
          <div class="button-tab">
            <!-- <a href="#" class="link-tab-1a"><img src="img/front/link-tab-3.png" alt="変更する"></a> -->
            <button type="button" class="link-tab-1a" id="btn-edit-user-info"><img src="<?php echo $this->webroot; ?>img/front/change.png" alt="変更する"></button>
            <button type="submit" class="link-tab-1a" id="btn-save-user-info"><img src="<?php echo $this->webroot; ?>img/front/save-b.png" alt="Save"></button>
            <button type="button" class="link-tab-1b" id="btn-cancel-user-info"><img src="<?php echo $this->webroot; ?>img/front/Cancel.png" alt="Cancel"></button>
          </div>
        <?php }
            else {?>
            <script type="text/javascript" charset="utf-8" async defer></script>
        <?php }?>
        <!-- MAIN SCRIPT -->
        <script type="text/javascript" >
            
            $( document ).ready(function() {
              if(edit != 1){
                
                $('#btn-edit-user-info').show();
                $('#btn-save-user-info').hide();
                $('#btn-cancel-user-info').hide();
                $('#UserEditBasicInfo').find(':input:not(#btn-edit-user-info)').prop('disabled',true);
                $('#UserEditBasicInfo').find('a:not(#btn-edit-user-info)').hide();
                //alert(edit);
              }
              else{
                $('#btn-cancel-user-info').show();
                $('#btn-save-user-info').show();
                  
               
                $('#btn-edit-user-info').hide();
              }
            });

               $('#btn-edit-user-info').on('click', function() {
                  
                  $('#UserEditBasicInfo').find(':input:not(#email)').prop('disabled',false);

                  $('#salary_type_other').prop('disabled', $('input[name="data[UserCompany][salary_type]"]:checked').val() != "4" );

                  $('#salary_date').prop('disabled', $('input[name="data[UserCompany][salary_receive_id]"]:checked').val() != "3" );

                  $('#UserEditBasicInfo').find('a').show();
                  $('#btn-cancel-user-info').show();
                  $('#btn-save-user-info').show();
                  $('#btn-edit-user-info').hide();
                  edit = 1;

               });
               $('#btn-cancel-user-info').on('click', function() {
                   $('#btn-edit-user-info').show();
                    $('#btn-save-user-info').hide();
                    $('#btn-cancel-user-info').hide();
                    $('#UserEditBasicInfo').find(':input:not(#btn-edit-user-info)').prop('disabled',true);
                    $('#UserEditBasicInfo').find(':button:not(#btn-edit-user-info)').hide();
                    $.ajax({
                       url: "<?php echo $this->webroot;?>users/update_basic_info",
                        success: function(result){
                          edit = 0;
                          $('#basic').html(result);
                        }
                    });
               });

            </script>
        <!-- END MAIN SCRIPT -->
        </form>
        </div>
      </div>
    </div>
</div>

<!-- SCRIPT VALIDATION -->
<script>
    var num_area1 = <?php echo sizeof($user['ExpectArea'])?>;
    var order_object1 = <?php echo sizeof($user['ExpectArea'])?>;
    //alert(order_object);

    function replaceAll(find, replace, str) {
        return str.replace(new RegExp(find, 'g'), replace);
    }

    $('#btn-add').on('click', function() {
       // alert(num_area);
      order_object1++;
    if( num_area1 < 5 ){
      var area = $('#expect-area-content-1').clone();

      area.html(area.html().replace(/\[1\]/g, '['+ order_object1 + ']' ).replace('id="post_num_1_1"', 'id="post_num_1_'+ order_object1  + '"' ).replace('id="post_num_2_1"', 'id="post_num_2_'+ order_object1  + '"' ) );

 area.find("input").val('');
      area.prepend($('#remove').clone().html());
      $('#expect-area').append(area);
      $('#UserEditBasicInfo').validate();
      $("#post_num_1_" + order_object1 ).rules("add", 
          { 
            number: true,
            minlength: 3,
            maxlength: 3,
            messages: {
                minlength: "<?php echo __('global.errors.minlength_3'); ?>",
                maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
            }
          });
      $("#post_num_2_" + order_object1 ).rules("add", 
          { 
            number: true,
            minlength: 4,
            maxlength: 4,
            messages: {
              minlength: "<?php echo __('global.errors.minlength_4'); ?>",
              maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
            }
          });
            // $("[id^='pref_id']").each(function() {
      //     $(this).rules("add", 
      //     { 
      //       required: true,
      //       messages: {
      //         required: "<?php echo __('global.errors.required'); ?>"
      //       }
      //     });
      // });
      // $("[id^='city']").each(function() {
      //     $(this).rules("add", 
      //     { 
      //       required: true,
      //       messages: {
      //         required: "<?php echo __('global.errors.required'); ?>"
      //       }
      //     });
      // });
      // $("[id^='address']").each(function() {
      //     $(this).rules("add", 
      //     { 
      //       required: true,
      //       messages: {
      //         required: "<?php echo __('global.errors.required'); ?>"
      //       }
      //     });
      // });
      
      num_area1++;
      if(num_area1 == 5){
        $('#btn-add').hide();
      }
    }
    else {
      alert('Cannot add more item');
    }
  });

    function _remove (obj) {
        num_area1--;
        obj.parent().parent().parent().remove();
        $('#btn-add').show();
    }

    $.validator.addMethod("phone_number", function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    }, "携帯電話を正しく入力してください。" );

    $.validator.addMethod("integer_number", function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    }, "半角数字で入力してください。" );

    $.validator.addMethod("check_zero", function(value, element) {
        a = $('#month_worked').val();
        b = $('#year_worked').val();
        return (a == "" && b == "") || ( parseInt(a) > 0 || parseInt(b) > 0 );
      },"<?php echo __('global.errors.required'); ?>");

    $("#UserEditBasicInfo").validate({
        rules: {
            //'data[User][first_name]': {required: true},
            //'data[User][last_name]': {required: true},
            //'data[User][first_name_kana]': {required: true},
            //'data[User][last_name_kana]': {required: true},
            // 'data[User][gender]': {required: true},
            // 'data[User][year_of_birth]': {required: true},
            // 'data[User][month_of_birth]': {required: true},
            // 'data[User][day_of_birth]': {required: true},
            // 'data[User][married_status_id]': {required: true},
            // 'data[User][live_with_family]': {required: true},
            'data[User][num_child]': {
              number: true,
              maxlength: 2,
              integer_number: "^[0-9]*$"
            },
            'data[UserAddress][post_num_1]': {number: true, minlength: 3, maxlength: 3},
            'data[UserAddress][post_num_2]': {number: true, minlength: 4, maxlength: 4},
            // 'data[UserAddress][city]': {required: true},
            // 'data[UserAddress][house_name]': {required: true},
            // 'data[UserAddress][residence_id]': {required: true},
            'data[UserAddress][year_residence]': {number: true},
            'data[UserAddress][housing_costs]': {number: true},
            'data[User][phone]': {
                required: function(element) {
                return !$("#home_phone").val();
              },
                number: true,
                maxlength: 11,
                minlength: 11,
                phone_number: "^0[0-9]"
            },
            'data[User][home_phone]': {
                required: function(element) {
                return  !$("#phone").val();
              },
                number: true,
                maxlength: 10,
                minlength: 10,
                phone_number: "^0[0-9]"
            },
            // 'data[User][contact_type]': {required: true},
            // 'data[UserCompany][work_id]': {required: true},
            // 'data[UserCompany][name]': {required: true},
            // 'data[UserCompany][name_kana]': {required: true},
            'data[UserCompany][post_num_1]': {number: true, minlength: 3, maxlength: 3},
            'data[UserCompany][post_num_2]': {number: true, minlength: 4, maxlength: 4},
            // 'data[UserCompany][pref_id]': {required: true},
            // 'data[UserCompany][city]': {required: true},
            'data[UserCompany][phone]': {
              number: true,
              maxlength: 11, 
              minlength: 10,
              phone_number: "^0[0-9]"
            },
            'data[UserCompany][fax]': {
              number: true,
              maxlength: 10,
              minlength: 10
            },
            // 'data[UserCompany][description]': {required: true},
            // 'data[UserCompany][department]': {required: true},
            // 'data[UserCompany][position]': {required: true},
            'data[UserCompany][year_worked]': {
              check_zero: true,
              number: true,
              min: 0
            },
            'data[UserCompany][month_worked]': {
              // required: function(element) {
              //   if($('#year_worked').val() == "0" || $('#year_worked').val() == "") {
              //     return true;
              //   } else {
              //     return false;
              //   }
              // },
              check_zero: true,
              number: true,
              min: 0,
              max: 11
            },
            'data[UserCompany][salary_type_other]': {
              required: {
                depends: function() {
                  return $('input[name="data[UserCompany][salary_type]"]:checked').val() == '4';
                }
              },
              number: true            
            },
            'data[UserCompany][salary_month]': {number: true},
            'data[UserCompany][salary_year]': {number: true},
            'data[UserCompany][salary_date]': {
              // required: {
              //   depends:  function() {
              //     return $('input[name="data[UserCompany][salary_receive_id]"]:checked').val() == '3';
              //   }
              // },
              number: true,
              min: 1,
              max: 30
            },
            'data[User][debt_count]': {number: true},
            'data[User][debt_total_value]': {number: true},
            'data[User][debt_pay_per_month]': {number: true},
            <?php for( $i = 1; $i <= sizeof($user['ExpectArea']); ++$i ) {  ?>
            'data[ExpectArea][<?php echo $i ?>][post_num_1]': {number: true, minlength: 3, maxlength: 3},
            'data[ExpectArea][<?php echo $i ?>][post_num_2]': {number: true, minlength: 4, maxlength: 4},
            <?php } ?>
            // 'data[ExpectArea][1][pref_id]': {required: true},
            // 'data[ExpectArea][1][city]': {required: true}
        },
        messages: {
            'data[User][first_name]': {required: "<?php echo __('global.errors.basic_info.firstname'); ?>"},
            'data[User][last_name]': {required: "<?php echo __('global.errors.basic_info.lastname'); ?>"},
            'data[User][first_name_kana]': {required: "<?php echo __('global.errors.basic_info.firstnamekana'); ?>"},
            'data[User][last_name_kana]': {required: "<?php echo __('global.errors.basic_info.lastnamekana'); ?>"},
            'data[UserAddress][post_num_1]': {
              minlength: "<?php echo __('global.errors.minlength_3'); ?>",
              maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
            },
            'data[UserAddress][post_num_2]': {
              minlength: "<?php echo __('global.errors.minlength_4'); ?>",
              maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
            },
            'data[UserCompany][post_num_1]': {
              minlength: "<?php echo __('global.errors.minlength_3'); ?>",
              maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
            },
            'data[UserCompany][post_num_2]': {
              minlength: "<?php echo __('global.errors.minlength_4'); ?>",
              maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
            },
            'data[UserCompany][salary_type_other]': {required: "<?php echo __('global.errors.required'); ?>"},
            'data[UserCompany][salary_date]': {
              // required: "<?php echo __('global.errors.required'); ?>",
              min: "<?php echo __('global.errors.salary_date.min'); ?>",
              max: "<?php echo __('global.errors.salary_date.max') ?>"
            },
            'data[User][num_child]': {maxlength: "<?php echo __('global.errors.maxlength_2'); ?>"},
            'data[User][phone]': {
              required: "<?php echo __('global.errors.required'); ?>",
              maxlength: "<?php echo __('global.errors.maxlength_11'); ?>",
              minlength: "<?php echo __('global.errors.minlength_11'); ?>"
            },
            'data[User][home_phone]': {
              required: "<?php echo __('global.errors.required'); ?>",
              maxlength: "<?php echo __('global.errors.maxlength_10'); ?>",
              minlength: "<?php echo __('global.errors.minlength_10'); ?>"
            },
            'data[UserCompany][phone]': {
              maxlength: "<?php echo __('global.errors.company.phone'); ?>",
              minlength: "<?php echo __('global.errors.company.phone'); ?>"
            },
            'data[UserCompany][fax]': {
              maxlength: "<?php echo __('global.errors.maxlength_10'); ?>",
              minlength: "<?php echo __('global.errors.minlength_10'); ?>"
            },
            'data[UserCompany][month_worked]': {
              required: "<?php echo __('global.errors.required'); ?>",
              min: "<?php echo __('global.errors.month.min'); ?>",
              max: "<?php echo __('global.errors.month.max') ?>"
            },
            'data[UserCompany][year_worked]': {
              required: "<?php echo __('global.errors.required'); ?>",
              min: "<?php echo __('global.errors.month.min'); ?>"
            }
        },
        tooltip_options: {
          
        },
        invalidHandler: function(event, validator) {
          var errors = validator.numberOfInvalids();
          if (errors) {
            $("#error-section").show();
          } else {
            $("#error-section").hide();
          }
        },
        submitHandler: function(form) {
            $('#btn-save-user-info').prop('disabled', true);
            var url = "<?php echo $this->webroot;?>users/update_basic_info";
            $.ajax({
                type: "POST",
                url: url,
                data: $("#UserEditBasicInfo").serialize(),
                success: function(result)
                {
                    edit = 0;
                    $('#basic').html(result);
                    $('#btn-save-user-info').prop('disabled', false);
                    //reload dashboard
                    $.ajax({
                        url: "<?php echo $this->webroot?>users/reload_dashboard",
                        success: function(result){
                          $('#home').html(result);
                        }
                    });
                    $.ajax({
                        url: "<?php echo $this->webroot?>user_partners/edit",
                        success: function(result){
                          $('#partner').html(result);
                        }
                    });
                }
            }).done(function() {
             $('#btn-save-user-info').prop('disabled', false);
            });
            return false;
        }
      });
      jQuery.extend(jQuery.validator.messages, {
          number: "<?php echo __('global.errors.number'); ?>"
      });

      jQuery(function($) {
      $('#salary_month').autoNumeric('init', {aNum: '0123456789',mRound: 'CHF'});  
      $('#salary_year').autoNumeric('init', {aNum: '0123456789',mRound: 'CHF'});      
      $('#debt_total').autoNumeric('init', {aNum: '0123456789',mRound: 'CHF'});   
      $('#debt_month').autoNumeric('init', {aNum: '0123456789',mRound: 'CHF'});   
  });
</script>
<!-- END SCRIPT VALIDATION -->