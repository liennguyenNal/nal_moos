<div class="from-login">
    <div class="from-ldpage">
      <div class="content">
        <div class="content-from">
          <div class="title-tab title-tab-fix-mb">
            <h3>申込人基本情報</h3>
          </div>
          <!-- FORM -->
          <?php echo $this->element('flash');?>
            <div class="block-warning" id="error-section" style="display:none">
                <?php echo __('global.errors'); ?>
            </div>
          <?php echo $this->Form->create("User", array('action'=>'update_basic_info','id'=>'UserEditBasicInfo')) ?>
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
                            <?php echo $this->Form->input('User.first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement' => 'right'))
                            ?>
                          </div>
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
                            <?php echo $this->Form->input('User.last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement' => 'right'))
                            ?>
                          </div>
                        </div>
                        <div class="block-input">
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
                            <?php echo $this->Form->input('User.first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement' => 'right'))
                            ?>
                          </div>
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
                            <?php echo $this->Form->input('User.last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement' => 'right'))
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
                                echo $this->Form->radio('User.gender', array('male'=>__('user.register.male'),'female'=> __('user.register.female')), array( 'class'=>'radio', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'class'=>'fix-pd', 'data-placement' => 'right'));
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
                                $years = array_combine(range(1930, date("Y")), range(1930, date("Y")));
                                echo $this->Form->select('year_of_birth', $years, array('id'=>'year', 'onchange'=>'calculate_age()', 'data-placement' => 'right'));
                            ?>
                          <span><?php echo __('user.register.year'); ?></span>
                            <?php 
                                $months = array_combine(range(1, 12), range(1, 12));
                                echo $this->Form->select('month_of_birth', $months, array('id'=>'month', 'data-placement' => 'right'));
                            ?>
                          <span><?php echo __('user.register.month'); ?></span>
                            <?php 
                                $dates = array_combine(range(1, 31), range(1, 31));
                                echo $this->Form->select('day_of_birth', $dates, array('id'=>'day', 'data-placement' => 'right'));
                            ?>
                          <span><?php echo __('user.register.day'); ?></span>
                          <span class="style" id="age">0</span>
                          <span class="style"><?php echo __('user.register.age'); ?></span>
                            <!-- Script tinh tuoi -->
                            <script type="text/javascript">
                                var d = new Date();
                                var n = d.getFullYear();
                                $("#age").html(n - $("#year").val());
                                function calculate_age(){
                                    $("#age").html(n - $("#year").val());
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
                                    echo $this->Form->radio('married_status_id', $married_statuses, array('label'=>false, 'div'=>false, 'legend'=>false, 'default'=>false, 'class'=>'fix-pd', 'data-placement' => 'right'));
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
                                    echo $this->Form->radio('User.live_with_family', array(1=>__('user.my_page.basic_info.have_family') ,2=>__('user.my_page.basic_info.alone')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1, 'data-placement' => 'right'));
                                ?> 
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.my_page.basic_info.num_children'); ?></label><span><?php echo __('global.require'); ?></span></td>
                      <td>
                        <div class="block-input">
                          <?php echo $this->Form->input('User.num_child', array('type'=>'text', 'id'=>"num_child", 'label'=>false, 'class'=>'w40', 'div'=>false, 'data-placement' => 'right'))
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
                            echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'w40', "placeholder"=>false,'div'=>false, 'data-placement' => 'right'))
                        ?>
                        <span class="w-auto1">-</span>
                        <?php 
                            echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'w80', "placeholder"=>false,'div'=>false, 'data-placement' => 'right'))
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
                                echo $this->Form->select('UserAddress.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'--------', 'data-placement' => 'right'));
                            ?>
                        </div>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.city'); ?></span>
                        <?php 
                            echo $this->Form->input('UserAddress.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'placeholder'=>false, 'data-placement' => 'right'));
                        ?>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.street'); ?></span>
                        <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198','div'=>false, 'placeholder'=>false, 'data-placement' => 'right'))
                        ?>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.house'); ?></span>
                        <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'w198', "placeholder"=>false,'div'=>false, 'data-placement' => 'right'))
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.residence'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="select">
                        <?php echo $this->Form->select('UserAddress.residence_id', $residences, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'residence_id', 'data-placement'=>'right', 'empty'=>'--------')); 
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.year_residence'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserAddress.year_residence', array('type'=>'text', 'id'=>"year_residence",'label'=>false, 'class'=>'w40','div'=>false, 'data-placement'=>'right'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.year'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.house_cost'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserAddress.housing_costs', array('type'=>'text', 'id'=>"housing_costs",'label'=>false, 'class'=>'w108','div'=>false, 'data-placement'=>'right'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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
                          <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right'))
                          ?>
                        </div>
                        <div class="div-style">
                          <span class="w43"><?php echo __('user.register.homephone'); ?></span>
                          <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>false, 'class'=>'w198','div'=>false, 'data-placement'=>'right'))
                          ?>
                        </div>
                      </div>
                      <span class="black">※どちらかひとつ必須。”-”ハイフンなしで入力してください。</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.email'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                        <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email",'label'=>false, 'class'=>'w40 input-style', 'div'=>false, 'disabled'=>'true'))
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
                                echo $this->Form->radio('User.contact_type', array('1'=>__('user.register.mobiphone'),'2'=>__('user.my_page.basic_info.home_phone'),'3'=>__('user.my_page.basic_info.work_phone')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'data-placement'=>'right'));
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
                            echo $this->Form->select('UserCompany.work_id', $works, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------', 'data-placement'=>'right'));
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.company'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.my_page.basic_info.company_name'); ?></span>
                        <?php echo $this->Form->input('UserCompany.name', array('type'=>'text', 'id'=>"company-name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right'))
                        ?>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.my_page.basic_info.company_name_kana'); ?></span>
                        <?php echo $this->Form->input('UserCompany.name_kana', array('type'=>'text', 'id'=>"company-name-kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right'))
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.address'); ?></label></td>
                    <td>
                      <div class="block-input">
                        <span class="w-auto1"><?php echo __('user.register.post'); ?></span>
                        <?php echo $this->Form->input('UserCompany.post_num_1', array('type'=>'text', 'id'=>"company_post_num_1", 'label'=>false, 'class'=>'w40', 'div'=>false, 'data-placement'=>'right'))
                        ?>
                        <span class="w-auto1">-</span>
                        <?php echo $this->Form->input('UserCompany.post_num_2', array('type'=>'text', 'id'=>"company_post_num_2", 'label'=>false, 'class'=>'w80', 'div'=>false, 'data-placement'=>'right'))
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
                              echo $this->Form->select('UserCompany.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'company_pref_id', 'empty'=>'--------', 'data-placement'=>'right'));
                            ?>
                        </div>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.city'); ?></span>
                        <?php 
                            echo $this->Form->input('UserCompany.city', array('type'=>'text', 'id'=>"company_city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right'));
                        ?>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.street'); ?></span>
                        <?php echo $this->Form->input('UserCompany.address', array('type'=>'text', 'id'=>"company_address", 'label'=>false, 'class'=>'w198','div'=>false, 'data-placement'=>'right', 'required'=>false))
                        ?>
                      </div>
                      <div class="block-input">
                        <span class="w78"><?php echo __('user.register.house'); ?></span>
                        <?php echo $this->Form->input('UserCompany.house_name', array('type'=>'text', 'id'=>"company_house_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right', 'data-placement'=>'right'))
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.contact.company-phone'); ?></label></td>
                    <td>
                      <div class="block-input fix-padding">
                        <div class="div-style">
                          <?php echo $this->Form->input('UserCompany.phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'data-placement'=>'right'))
                          ?>
                          <span class="style">※”-”ハイフンなしで入力してください。</span>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.fax'); ?></label></td>
                    <td>
                      <div class="block-input fix-padding">
                        <div class="div-style">
                          <?php echo $this->Form->input('UserCompany.fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'data-placement'=>'right'))
                          ?>
                          <span class="style">※”-”ハイフンなしで入力してください。</span>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.career'); ?></label></td>
                    <td>
                      <div class="select">
                        <?php echo $this->Form->select('UserCompany.career_id', $careers, array('class'=>'w198','div'=>false, 'label'=>false, 'id'=>'carrer_id', 'empty'=>'--------', 'data-placement'=>'right'));
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.description'); ?></label></td>
                    <td>
                        <?php echo $this->Form->input('UserCompany.description', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'data-placement'=>'right'))
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.department'); ?></label></td>
                    <td>
                        <?php echo $this->Form->input('UserCompany.department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'data-placement'=>'right'))
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.position'); ?></label></td>
                    <td>
                        <?php echo $this->Form->input('UserCompany.position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'data-placement'=>'right'))
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.experience'); ?></label></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'data-placement'=>'right'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.year'); ?></span>
                        <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'data-placement'=>'right'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.month'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_type'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="form-radio">
                        <div class="form-w">
                          <div class="block-input-radio">
                            <?php 
                                echo $this->Form->radio('UserCompany.salary_type', array('1'=>__('user.my_page.basic_info.salary_fix'),'2'=>__('user.my_page.basic_info.salary_bonus'), '3'=>__('user.my_page.basic_info.salary_product'), "4"=>__('global.other')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'id'=>'salary_type', 'onchange'=>'change_type($(this))', 'data-placement'=>'right'));
                            ?>
                            <script type="text/javascript">
                                function change_type(obj){
                                    if(obj.val() == '4')
                                    $('#salary_type_other').prop('disabled',false);
                                    else {
                                      $('#salary_type_other').prop('disabled',true);
                                    }
                                }
                            </script>  
                          </div>
                            <?php 
                                echo $this->Form->input('UserCompany.salary_type_other', array('type'=>'text', 'id'=>"salary_type_other", 'label'=>false, 'class'=>'w40 input-style fix-pd','div'=>false, 'disabled'=>true, 'data-placement'=>'right'))
                            ?>
                        </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.tax'); ?></label></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserCompany.salary_month', array('type'=>'text', 'id'=>"salary_month", 'label'=>false, 'class'=>'w108','div'=>false, 'data-placement'=>'right'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_year'); ?></label></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserCompany.salary_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'w108','div'=>false, 'data-placement'=>'right'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.my_page.basic_info.salary_man'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_receive'); ?></label></td>
                    <td>
                      <div class="form-radio">
                        <div class="form-w">
                          <div class="block-input-radio">
                            <?php 
                                echo $this->Form->radio('UserCompany.salary_receive_id', array('1'=>__('user.my_page.basic_info.salary_day'),'2'=>__('user.my_page.basic_info.salary_week'), '3'=>__('user.my_page.basic_info.salary_month')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'data-placement'=>'right')); 
                            ?>
                          </div>
                          <div class="style-a">
                            <label for="11"><?php echo __('user.my_page.basic_info.salary_date'); ?></label>
                            <?php 
                                echo $this->Form->input('UserCompany.salary_date', array('type'=>'text', 'id'=>"salary_date", 'label'=>false, 'class'=>'w40','div'=>false, 'data-placement'=>'right')) 
                            ?>
                            <label for="11"><?php echo __('global.date'); ?></label>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.insurances'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="select">
                        <?php 
                            echo $this->Form->select('UserCompany.insurance_id', $insurances, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------', 'data-placement'=>'right'));
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.note'); ?></label></td>
                    <td>
                      <span class="black style">※派遣社員の方は派遣先、出向中の方は出向先、入社6ヶ月以下の方は前職の情報を入力ください。</br>※未就業（職業が専業主婦／主夫、無職、その他の方）で収入がある場合、詳細な情報を記載ください。</span>
                      <?php echo $this->Form->input('UserCompany.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'div'=>false, 'data-placement'=>'right', 'rows'=>4, 'cols'=>50))
                      ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          
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
                        <?php echo $this->Form->input('User.debt_count', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 style', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.my_page.basic_info.count'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.debt_total'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('User.debt_total_value', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 style', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.my_page.basic_info.salary_man'); ?></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.my_page.basic_info.debt_month'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('User.debt_pay_per_month', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 style', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
                        ?>
                        <span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
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
                <?php if($i > 1){?>
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
                            <?php echo $this->Form->input("ExpectArea.$i.post_num_1", array('type'=>'text', 'id'=>"post_num_1",'label'=>false, 'class'=>'w40', 'div'=>false, 'value'=>$item['post_num_1'], 'required'=>false, 'data-placement'=>'right'))
                            ?>
                            <span class="w-auto1">-</span>
                            <?php echo $this->Form->input("ExpectArea.$i.post_num_2", array('type'=>'text', 'id'=>"post_num_2",  'label'=>false, 'class'=>'w80', 'div'=>false, 'value'=>$item['post_num_2'], 'required'=>false, 'data-placement'=>'right'))
                            ?>
                            <a type="button" class="style-link" id="btn-find-expect-address" onclick="javascript:find_address($(this));"><?php echo __('user.register.findaddress'); ?></a>
                          </div>
                          <div class="block-input">
                            <span class="w78"><?php echo __('user.register.pref'); ?></span>
                            <div class="select">
                                <?php echo $this->Form->select("ExpectArea.$i.pref_id", $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'--------', 'value'=>$item['pref_id'], 'required'=>false, 'data-placement'=>'right'));
                                ?>
                            </div>
                          </div>
                          <div class="block-input">
                            <span class="w78"><?php echo __('user.register.city'); ?></span>
                            <?php echo $this->Form->input("ExpectArea.$i.city", array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'w198','div'=>false, 'value'=>$item['city'], 'required'=>false, 'data-placement'=>'right'))
                            ?>
                          </div>
                          <div class="block-input">
                            <span class="w78"><?php echo __('user.register.street'); ?></span>
                            <?php echo $this->Form->input("ExpectArea.$i.address", array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'w198', 'div'=>false, 'value'=>$item['address'], 'required'=>false, 'data-placement'=>'right'))
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
                    <a href="javascript:void(0)" class="style-link" id='btn-add'>+ 希望エリアを追加</a>
                </div>
            </div>

            <section id="remove" style="display:none">
                <div class="link-form style" >
                    <div class="block-link">
                        <a href="javascript:void(0)" class="style-link" id='btn-remove' onclick="javascript:_remove($(this));">- 希望エリアを削除</a>
                    </div>
                </div>
            </section>

          <?php echo $this->Form->hidden('User.id')?>
            <!-- SCRIPT -->
            <script type="text/javascript">
                $(this).autoKana('#first_name', '#first_name_kana', {katakana:true, toggle:false});
                $(this).autoKana('#last_name', '#last_name_kana', {katakana:true, toggle:false});
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
              <!-- END SCRIPT -->
        <?php echo $this->Form->hidden('User.is_confirm', array('value'=> 1, 'id'=>'user-info-id'))?>
        <?php if($user['User']['status_id'] == 2){?>
          <div class="button-tab">
            <!-- <a href="#" class="link-tab-1a"><img src="img/front/link-tab-3.png" alt="変更する"></a> -->
            <button type="button" class="link-tab-1a" id="btn-edit-user-info"><img src="<?php echo $this->webroot; ?>img/front/Update.png" alt="Update"></button>
            <button type="submit" class="link-tab-1a" id="btn-save-user-info"><img src="<?php echo $this->webroot; ?>img/front/Save.png" alt="Save"></button>
            <button type="button" class="link-tab-1b" id="btn-cancel-user-info"><img src="<?php echo $this->webroot; ?>img/front/Cancel.png" alt="Cancel"></button>
          </div>
        <?php }
            else {?>
            <script type="text/javascript" charset="utf-8" async defer></script>
        <?php }?>
        <!-- MAIN SCRIPT -->
        <script type="text/javascript" >
            var edit;
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
                  
                  $('#UserEditBasicInfo').find(':input').prop('disabled',false);
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
                          $('#guarantor').html(result);
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
    if( num_area1 < 5 ){
        order_object1++;
      var area = $('#expect-area-content-1').clone();
      area.html(area.html().replace(/\[1\]/g, '['+ order_object1 + ']' ));
      area.find("input").val('');
      area.prepend($('#remove').clone().html());
      $('#expect-area').append(area);
      $('#UserEditBasicInfo').validate();
      $("[id^='post_num_1']").each(function() {
          $(this).rules("add", 
          { 
            number: true,
            minlength: 3,
            maxlength: 3,
            messages: {
                minlength: "<?php echo __('global.errors.minlength_3'); ?>"
            }
          });
      });
      $("[id^='post_num_2']").each(function() {
          $(this).rules("add", 
          { 
            number: true,
            minlength: 4,
            maxlength: 4,
            messages: {
              minlength: "<?php echo __('global.errors.minlength_4'); ?>"
            }
          });
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
      order_object1++;
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

    $("#UserEditBasicInfo").validate({
        rules: {
            // 'data[User][first_name]': {required: true},
            // 'data[User][last_name]': {required: true},
            // 'data[User][first_name_kana]': {required: true},
            // 'data[User][last_name_kana]': {required: true},
            // 'data[User][gender]': {required: true},
            // 'data[User][year_of_birth]': {required: true},
            // 'data[User][month_of_birth]': {required: true},
            // 'data[User][day_of_birth]': {required: true},
            // 'data[User][married_status_id]': {required: true},
            // 'data[User][live_with_family]': {required: true},
            'data[User][num_child]': {number: true},
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
                phone_number: "^0[0-9]{9}"
            },
            'data[User][home_phone]': {
                required: function(element) {
                return  !$("#phone").val();
              },
                number: true,
                phone_number: "[0-9]{11}"
            },
            // 'data[User][contact_type]': {required: true},
            // 'data[UserCompany][work_id]': {required: true},
            // 'data[UserCompany][name]': {required: true},
            // 'data[UserCompany][name_kana]': {required: true},
            'data[UserCompany][post_num_1]': {number: true, minlength: 3, maxlength: 3},
            'data[UserCompany][post_num_2]': {number: true, minlength: 4, maxlength: 4},
            // 'data[UserCompany][pref_id]': {required: true},
            // 'data[UserCompany][city]': {required: true},
            'data[UserCompany][phone]': {number: true, phone_number: "^0[0-9]{9}"},
            'data[UserCompany][fax]': {number: true},
            // 'data[UserCompany][description]': {required: true},
            // 'data[UserCompany][department]': {required: true},
            // 'data[UserCompany][position]': {required: true},
            'data[UserCompany][year_worked]': {number: true},
            'data[UserCompany][month_worked]': {number: true},
            // 'data[UserCompany][salary_type_other]': {required: true},
            'data[UserCompany][salary_month]': {number: true},
            'data[UserCompany][salary_year]': {number: true},
            'data[UserCompany][salary_date]': {number: true},
            'data[User][debt_count]': {number: true},
            'data[User][debt_total_value]': {number: true},
            'data[User][debt_pay_per_month]': {number: true},
            'data[ExpectArea][1][post_num_1]': {number: true, minlength: 3, maxlength: 3},
            'data[ExpectArea][1][post_num_2]': {number: true, minlength: 4, maxlength: 4}
            // 'data[ExpectArea][1][pref_id]': {required: true},
            // 'data[ExpectArea][1][city]': {required: true}
        },
        messages: {
            'data[UserAddress][post_num_1]': {minlength: "<?php echo __('global.errors.minlength_3'); ?>"},
            'data[UserAddress][post_num_2]': {minlength: "<?php echo __('global.errors.minlength_4'); ?>"},
            'data[UserCompany][post_num_1]': {minlength: "<?php echo __('global.errors.minlength_3'); ?>"},
            'data[UserCompany][post_num_2]': {minlength: "<?php echo __('global.errors.minlength_4'); ?>"}
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
            var url = "<?php echo $this->webroot;?>users/update_basic_info";
            $.ajax({
                type: "POST",
                url: url,
                data: $("#UserEditBasicInfo").serialize(),
                success: function(result)
                {
                    edit = 0;
                    $('#basic').html(result);
                }
            });
            return false;
        }
      });
      jQuery.extend(jQuery.validator.messages, {
          number: "<?php echo __('global.errors.number'); ?>"
      });
</script>
<!-- END SCRIPT VALIDATION -->