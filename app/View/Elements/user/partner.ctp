<div class="from-login">
  <div class="from-ldpage">
    <div class="content">
      <div class="content-from">
        <div class="title-tab title-tab-fix-mb">
          <h3>配偶者基本情報</h3>
        </div>
        <!-- FORM -->
        <?php echo $this->element('flash_success');?>
        <div class="block-warning" id="error-section" style="display:none">
            <?php echo __('global.errors'); ?>
        </div>
        <?php echo $this->Form->create("User", array('action'=>'edit','id'=>'UserPartnerEdit','inputDefaults' => array('format' => array('before', 'label', 'between', 'input', 'after', 'error'=>false ) ) ) ) 
        ?>
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
                          <?php echo $this->Form->input('UserPartner.first_name', array('type'=>'text', 'id'=>"p_first_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required' => false, 'data-placement'=>'right'))
                          ?>
                        </div>
                        <div class="div-style">
                          <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
                          <?php echo $this->Form->input('UserPartner.last_name', array('type'=>'text', 'id'=>"p_last_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required' => false, 'data-placement'=>'right'))
                          ?>
                        </div>
                      </div>
                      <div class="block-input">
                        <div class="div-style">
                          <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
                          <?php echo $this->Form->input('UserPartner.first_name_kana', array('type'=>'text', 'id'=>"p_first_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required' => false, 'data-placement'=>'right'))
                          ?>
                        </div>
                        <div class="div-style">
                          <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
                          <?php echo $this->Form->input('UserPartner.last_name_kana', array('type'=>'text', 'id'=>"p_last_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required' => false, 'data-placement'=>'right'))
                          ?>
                        </div>
                      </div>
                    </td>
                    <script type="text/javascript">
                      $(this).autoKana('#p_first_name', '#p_first_name_kana', {katakana:true, toggle:false});
                      $(this).autoKana('#p_last_name', '#p_last_name_kana', {katakana:true, toggle:false});
                    </script>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.gender') ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="form-radio">
                        <div class="form-w">
                          <div class="block-input-radio">
                            <?php 
                              echo $this->Form->radio('UserPartner.gender', array('male'=>__('user.register.male'),'female'=>__('user.register.female')), array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'required' => false, 'data-placement'=>'right'));
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
                          echo $this->Form->select('UserPartner.year_of_birth', $years, array('div'=>false, 'label'=>false, 'id'=>'p-year', 'onchange'=>'calculate_p_age()', 'required' => false, 'data-placement'=>'right'));
                        ?>
                        <span><?php echo __('user.register.year'); ?></span>
                        <?php 
                          $months = array_combine(range(1, 12), range(1, 12));
                          echo $this->Form->select('UserPartner.month_of_birth', $months, array('div'=>false, 'label'=>false, 'id'=>'month', 'required' => false, 'data-placement'=>'right'));
                        ?>
                        <span><?php echo __('user.register.month'); ?></span>
                        <?php 
                          $dates = array_combine(range(1, 31), range(1, 31));
                            echo $this->Form->select('UserPartner.day_of_birth', $dates, array('div'=>false, 'label'=>false, 'id'=>'day', 'required' => false, 'data-placement'=>'right'));
                        ?>
                        <span><?php echo __('user.register.day'); ?></span>
                        <span class="style" id="p-age">0</span>
                        <span class="style"><?php echo __('user.register.age'); ?></span>
                        <script type="text/javascript">
                            var d = new Date();
                            var n = d.getFullYear();
                            $("#p-age").html(n - $("#p-year").val());
                            function calculate_p_age(){
                              $("#p-age").html(n - $("#p-year").val());
                          }
                        </script>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        <div class="title-tab title-tab-fix-mb title-tab-fix-mt">
          <h3>配偶者連絡先情報</h3>
        </div>
          <div class="content-from-block">
            <div class="content-from-how">
              <table class="from" id="theform">
                <tbody>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.partner.phone'); ?></label><span><?php echo __('global.require'); ?></span></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserPartner.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
                        ?>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        <div class="title-tab title-tab-fix-mb title-tab-fix-mt">
          <h3>配偶者連絡先情報</h3>
        </div>

          <div class="content-from-how">
            <table class="from">
              <tbody>
                <tr>
                  <td class="label-text"><label><?php echo __('user.register.work'); ?></label><span><?php echo __('global.require'); ?></span></td>
                  <td>
                    <div class="select">
                      <?php 
                        echo $this->Form->select('UserPartner.work_id', $works, array('class'=>'w198','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------', 'required' => false));
                      ?>
                    </div>
                  </td>
                </tr> 
                <tr>
                  <td class="label-text"><label><?php echo __('user.partner.company'); ?></label></td>
                  <td>
                    <div class="block-input">
                      <span class="w78"><?php echo __('user.my_page.basic_info.company_name'); ?></span>
                      <?php echo $this->Form->input('UserPartner.company', array('type'=>'text', 'id'=>"p-company-name", 'label'=>false, 'class'=>'w198',  'div'=>false, 'required' => false, 'data-placement'=>'right'))
                      ?>
                    </div>
                    <div class="block-input">
                      <span class="w78"><?php echo __('user.my_page.basic_info.company_name_kana'); ?></span>
                      <?php echo $this->Form->input('UserPartner.company_kana', array('type'=>'text', 'id'=>"p-company-name-kana", 'label'=>false, 'class'=>'w198',  'div'=>false, 'required' => false, 'data-placement'=>'right'))
                      ?>
                    </div>
                    <script type="text/javascript">
                      $(this).autoKana('#p-company-name', '#p-company-name-kana', {katakana:true, toggle:false});
                    </script>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.register.address'); ?></label><span><?php echo __('global.require'); ?></span></td>
                  <td>
                    <div class="block-input">
                      <span class="w-auto1"><?php echo __('user.register.post'); ?></span>
                      <?php echo $this->Form->input('UserPartner.company_post_num_1', array('type'=>'text', 'id'=>"p_company_post_num_1", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required' => false, 'data-placement'=>"right"))
                      ?>
                      <span class="w-auto1">-</span>
                      <?php echo $this->Form->input('UserPartner.company_post_num_2', array('type'=>'text', 'id'=>"p_company_post_num_2", 'label'=>false, 'class'=>'w80', 'div'=>false, 'required' => false, 'data-placement'=>"right"))
                      ?>
                      <a href="javascript:void(0)" class="style-link" id="btn-partner-company-address" onclick="javascript:find_company_address($(this));"><?php echo __('user.register.findaddress'); ?></a>
                      <!-- Script tim dia chi buu dien -->
                      <script type="text/javascript">
                        function find_company_address(obj){
                          $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#p_company_post_num_1').val().trim() + $('#p_company_post_num_2').val().trim()}, 
                        function(json) {
                            $("#p_company_pref_id").val(json.pref_id);
                            $("#p_company_city").val(json.ward);
                            $("#p_company_address").val(json.addr1);
                        });
                      }
                      </script>
                    <!-- End script -->
                    </div>
                    <div class="block-input">
                      <span class="w78"><?php echo __('user.register.pref'); ?></span>
                      <div class="select">
                        <?php 
                          echo $this->Form->select('UserPartner.company_pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'p_company_pref_id', 'empty'=>'--------', 'required' => false, 'data-placement'=>'right'));
                        ?>
                      </div>
                    </div>
                    <div class="block-input">
                      <span class="w78"><?php echo __('user.register.city'); ?></span>
                      <?php 
                        echo $this->Form->input('UserPartner.company_city', array('type'=>'text', 'id'=>"p_company_city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required' => false, 'data-placement'=>"right", 'maxlength'=>false));
                      ?>
                    </div>
                    <div class="block-input">
                      <span class="w78"><?php echo __('user.register.street'); ?></span>
                      <?php echo $this->Form->input('UserPartner.company_address', array('type'=>'text', 'id'=>"p_company_address", 'label'=>false, 'class'=>'w198','div'=>false, 'required' => false, 'data-placement'=>"right"))
                      ?>
                    </div>
                    <div class="block-input">
                      <span class="w78"><?php echo __('user.register.house'); ?></span>
                      <?php echo $this->Form->input('UserPartner.company_house_name', array('type'=>'text', 'id'=>"p_company_house_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'','div'=>false, 'required' => false, 'data-placement'=>"right"))
                      ?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.contact.company-phone'); ?></label></td>
                  <td>
                    <div class="block-input fix-padding">
                      <div class="div-style">
                        <?php echo $this->Form->input('UserPartner.company_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'required' => false, 'data-placement'=>"right"))
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
                        <?php echo $this->Form->input('UserPartner.company_fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'required' => false, 'data-placement'=>"right"))
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
                      <?php echo $this->Form->select('UserPartner.career_id', $careers, array('class'=>'w198','div'=>false, 'label'=>false, 'id'=>'p_carrer_id', 'empty'=>'--------', 'required' => false, 'data-placement'=>'right'));
                      ?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.description'); ?></label></td>
                  <td>
                  <?php echo $this->Form->input('UserPartner.company_job_desc', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required' => false, 'data-placement'=>"right"))
                  ?>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.department'); ?></label></td>
                  <td><?php echo $this->Form->input('UserPartner.company_department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required' => false, 'data-placement'=>"right"))
                  ?>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.position'); ?></label></td>
                  <td>
                  <?php echo $this->Form->input('UserPartner.company_position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required' => false, 'data-placement'=>"right"))
                  ?>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.register.experience'); ?></label></td>
                  <td>
                    <div class="block-input">
                      <?php echo $this->Form->input('UserPartner.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required' => false, 'data-placement'=>"right"))
                      ?>
                      <span class="w-auto1"><?php echo __('user.register.year'); ?></span>
                      <?php echo $this->Form->input('UserPartner.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40',  'div'=>false, 'required' => false, 'data-placement'=>"right"))
                      ?>
                      <span class="w-auto1"><?php echo __('user.register.month'); ?></span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.contact_type'); ?></label><span><?php echo __('global.require'); ?></span></td>
                  <td>
                    <div class="form-radio">
                      <div class="form-w">
                        <div class="block-input-radio">
                          <?php 
                            echo $this->Form->radio('UserPartner.salary_type', array('1'=>__('user.my_page.basic_info.salary_fix'),'2'=>__('user.my_page.basic_info.salary_bonus'), '3'=>__('user.my_page.basic_info.salary_product'), "4"=>__('global.other')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'id'=>'salary_type', 'onchange'=>'p_change_type($(this))', 'data-placement'=>'right'));
                          ?>
                        <script type="text/javascript">
                            function g_change_type(obj){
                                if(obj.val() == '4')
                                $('#g_salary_type_other').prop('disabled',false);
                                else {
                                  $('#g_salary_type_other').prop('disabled',true);
                                }
                            }
                        </script>  
                      </div>
                        <?php 
                            echo $this->Form->input('UserPartner.salary_type_other', array('type'=>'text', 'id'=>"p_salary_type_other", 'label'=>false, 'class'=>'w40 input-style fix-pd','div'=>false, 'disabled'=>true, 'data-placement'=>'right', 'style'=>'width: 100px', 'required'=>false))
                        ?>
                      </div>
                      <script type="text/javascript">
                          function p_change_type(obj){
                              if(obj.val() == '4')
                              $('#p_salary_type_other').prop('disabled',false);
                              else {
                                $('#p_salary_type_other').prop('disabled',true);
                              }
                          }
                      </script>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.register.tax'); ?></label></td>
                  <td>
                    <div class="block-input">
                      <?php echo $this->Form->input('UserPartner.income_month', array('type'=>'text', 'id'=>"salary_month", 'label'=>false, 'class'=>'w108','div'=>false, 'required' => false, 'data-placement'=>"right"))
                      ?>
                      <span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_year'); ?></label></td>
                  <td>
                    <div class="block-input">
                      <?php echo $this->Form->input('UserPartner.income_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'w108','div'=>false, 'required' => false, 'data-placement'=>"right"))
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
                          echo $this->Form->radio('UserPartner.salary_receive_id', array('1'=>__('user.my_page.basic_info.salary_day'),'2'=> __('user.my_page.basic_info.salary_week'), '3'=>__('user.my_page.basic_info.salary_month')), array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'data-placement'=>'right', 'id'=>'salary_receive', 'onchange'=>'p_change_type_date($(this))')); 
                        ?>
                        </div>
                        <script type="text/javascript">
                          function p_change_type_date(obj){
                              if(obj.val() == '3')
                              $('#p_salary_date').prop('disabled',false);
                              else {
                                $('#p_salary_date').prop('disabled',true);
                              }
                          }
                      </script>
                        <div class="style-a">
                          <label ><?php echo __('user.my_page.basic_info.salary_date'); ?></label>
                          <?php echo $this->Form->input('UserPartner.salary_date', array('type'=>'text', 'id'=>"p_salary_date", 'label'=>false, 'class'=>'w40','div'=>false, 'required' => false, 'data-placement'=>"right" ))
                          ?> 
                          <label><?php echo __('global.date'); ?></label>
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
                        echo $this->Form->select('UserPartner.insurance_id', $insurances, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------', 'data-placement'=>'right', 'required' => false));
                      ?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.note'); ?></label></td>
                  <td>
                    <span class="black style">※派遣社員の方は派遣先、出向中の方は出向先、入社6ヶ月以下の方は前職の情報を入力ください。<br>※未就業（職業が専業主婦／主夫、無職、その他の方）で収入がある場合、詳細な情報を記載ください。</span>
                    <?php echo $this->Form->input('UserPartner.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'div'=>false, 'rows'=>"4", 'cols'=>"50", 'data-placement'=>'right'))
                    ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- RELATIONSHIP -->
          <div style="margin-top: 20px;" class="title-tab title-tab-fix-mb">
            <h3>同居人情報</h3>
          </div>

          <div id="relation-area">
          <?php 
          if(sizeof($user['UserRelation']) >0 )
            $len = sizeof($user['UserRelation']);
          else $len = 1;
          for($i =0; $i< $len; $i++){?>
            <section id="relation-area-content">
              
            <section id="remove" style="display:none">
                <div class="link-form style" >
                    <div class="block-link">
                        <a href="javascript:void(0)" class="style-link" id='btn-remove-relation' onclick="javascript:_remove_relation($(this));">- 希望エリアを削除</a>
                    </div>
                </div>
            </section>
            <?php if($i> 0){?>
            <section>
              <div class="link-form style" >
                    <div class="block-link">
                        <a href="javascript:void(0)" class="style-link" id='btn-remove-relation' onclick="javascript:_remove_relation($(this));">- 希望エリアを削除</a>
                    </div>
                </div>
            </section>
            <?php } ?>
            <div class="content-from-block" >
              <div class="content-from-how">
                <table class="from" id="theform">
                  <tbody>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.partner.name'); ?></label><span><?php echo __('global.require'); ?></span></td>
                      <td>
                        <div class="block-input">
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.firstname'); ?></span>
                            <?php echo $this->Form->input("UserRelation.$i.first_name", array('type'=>'text', 'id'=>"r_first_name_$i", 'label'=>false, 'class'=>'w198' ,'div'=>false, 'data-placement'=>"right", 'required'=>false))
                            ?>
                          </div>
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
                            <?php echo $this->Form->input("UserRelation.$i.last_name", array('type'=>'text', 'id'=>"r_last_name_$i", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right", 'required'=>false))
                            ?>
                          </div>
                        </div>
                        <div class="block-input">
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
                            <?php echo $this->Form->input("UserRelation.$i.first_name_kana", array('type'=>'text', 'id'=>"r_first_name_kana_$i", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right", 'required'=>false))
                            ?>
                          </div>
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
                            <?php echo $this->Form->input("UserRelation.$i.last_name_kana", array('type'=>'text', 'id'=>"r_last_name_kana_$i", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right", 'required'=>false))
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
                                echo $this->Form->radio("UserRelation.$i.gender", array('male'=>__('user.register.male'),'female'=>__('user.register.female')), array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'data-placement'=>'right', 'required'=>false));
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
                            echo $this->Form->select("UserRelation.$i.year_of_birth", $years, array('div'=>false, 'label'=>false, 'id'=>'p-year-<?php echo $i?>', 'onchange'=>'calculate_relation_age($(this))', 'data-placement'=>'right', 'required'=>false));
                          ?>
                          <span><?php echo __('user.register.year'); ?></span>
                          <?php 
                            $months = array_combine(range(1, 12), range(1, 12));
                            echo $this->Form->select("UserRelation.$i.month_of_birth", $months, array('div'=>false, 'label'=>false, 'id'=>'month', 'data-placement'=>'right', 'required'=>false));
                          ?>
                          <span><?php echo __('user.register.month'); ?></span>
                          <?php 
                          $dates = array_combine(range(1, 31), range(1, 31));
                            echo $this->Form->select("UserRelation.$i.day_of_birth", $dates, array('div'=>false, 'label'=>false, 'id'=>'day', 'data-placement'=>'right', 'required'=>false));
                          ?>
                          <span><?php echo __('user.register.day'); ?></span>
                          <span class="style" id="p-age-<?php echo $i?>">0</span>
                          <span class="style"><?php echo __('user.register.age'); ?></span>
                          <script type="text/javascript">
                              var d = new Date();
                              var n = d.getFullYear();
                              $("#p-age-<?php echo $i?>").html("<?php echo date('Y') - $user['UserRelation'][$i]['year_of_birth'] ?>");
                                function calculate_relation_age(obj){
                              var age = n - obj.val();
                              obj.parent().parent().find("span[id*='p-age-<?php echo $i?>']").html(age);
                          }
                          </script>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.my_page.guarantor.relationship'); ?></label><span><?php echo __('global.require'); ?></span></td>
                      <td>
                        <div class="block-input">
                          <?php echo $this->Form->input("UserRelation.$i.relate", array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right", "required"=>false))
                          ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.partner.phone'); ?></label></td>
                      <td>
                        <div class="block-input fix-padding">
                          <div class="div-style">
                            <?php echo $this->Form->input("UserRelation.$i.phone", array('type'=>'text', 'id'=>"r_phone", 'label'=>false, 'class'=>'w198', 'div'=>false,  'required'=>false, 'data-placement'=>"right"))
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.partner.info'); ?></label></td>
                      <td>
                        <div class="block-input">
                          <span class="w108"><?php echo __('user.partner.company'); ?></span>
                          <?php echo $this->Form->input("UserRelation.$i.company", array('type'=>'text', 'id'=>"r_company_$i", 'class'=>'w198', 'div'=>false, 'required'=>false,'label'=>false, 'data-placement'=>"right"))
                          ?>
                        </div>
                        <div class="block-input">
                          <span class="w108"><?php echo __('user.my_page.basic_info.company_name_kana'); ?></span>
                          <?php echo $this->Form->input("UserRelation.$i.school", array('type'=>'text', 'id'=>"r_school_$i",  'class'=>'w198', 'div'=>false,'label'=>false, 'required'=>false, 'data-placement'=>"right"))
                          ?>
                        </div>
                      </td>
                    </tr>
                    <?php echo $this->Form->hidden("UserRelation.$i.id");?>
                  </tbody>
                </table>
              </div>
            </div>
            </section>
            <script type="text/javascript">
              $(this).autoKana('#r_first_name_<?php echo $i?>', '#r_first_name_kana_<?php echo $i?>', {katakana:true, toggle:false});
                $(this).autoKana('#r_last_name_<?php echo $i?>', '#r_last_name_kana_<?php echo $i?>', {katakana:true, toggle:false});
                $(this).autoKana('#r_company_<?php echo $i?>', '#r_school_<?php echo $i?>', {katakana:true, toggle:false});
            </script>
            <?php } ?>
          </div>

            <div class="link-form style">
              <div class="block-link">
                <a href="javascript:void(0)" class="style-link" id='btn-add-relation'>+ 希望エリアを追加</a>
              </div>
            </div>
          <!-- END RELATIONSHIP -->

          <?php echo $this->Form->hidden('UserPartner.id')?>

          <?php echo $this->Form->hidden('Partner.is_confirm', array('value'=> 1, 'id'=>'user-info-id'))?>

           <?php echo $this->Form->hidden('Partner.is_confirm', array('value'=> 1, 'id'=>'user-info-id'))?>

          <?php if($user['User']['status_id'] == 2){?>
          <div class="button-tab">
            <button type="button" class="link-tab-1a" id="btn-edit-partner"><img src="<?php echo $this->webroot; ?>img/front/Update.png" alt="Update"></button>
            <button type="submit" class="link-tab-1a" id="btn-save-partner"><img src="<?php echo $this->webroot; ?>img/front/Save.png" alt="Save"></button>
            <button type="button" class="link-tab-1b" id="btn-cancel-partner"><img src="<?php echo $this->webroot; ?>img/front/Cancel.png" alt="Cancel"></button>
          </div>
           <?php } else { ?>
          <script type="text/javascript" charset="utf-8" async defer></script>
          <?php } ?>
                  
        <!-- MAIN SCRIPT -->         
        <script type="text/javascript" >
            var pedit;
            $( document ).ready(function() {
              if(pedit != 1){
                //alert(edit);
                $('#btn-edit-partner').show();
                $('#btn-save-partner').hide();
                $('#btn-cancel-partner').hide();
                $('#UserPartnerEdit').find(':input:not(#btn-edit-partner)').prop('disabled',true);
                $('#UserPartnerEdit').find('a:not(#btn-edit-partner)').hide();
                //alert(edit);
              }
              else{
                $('#btn-cancel-partner').show();
                $('#btn-save-partner').show();
                $('#btn-edit-partner').hide();
              }
            });

             $('#btn-edit-partner').on('click', function() {
                $('#UserPartnerEdit').find(':button:not(#btn-edit-partner)').show();
                $('#UserPartnerEdit').find(':input').prop('disabled',false);
                $('#UserPartnerEdit').find('a').show();
                $('#btn-cancel-partner').show();
                $('#btn-save-partner').show();
                $('#btn-edit-partner').hide();
                pedit = 1;
             });

             $('#btn-cancel-partner').on('click', function() {
                $('#btn-edit-partner').show();
                $('#btn-save-partner').hide();
                $('#btn-cancel-partner').hide();
                $('#UserPartnerEdit').find(':input:not(#btn-edit-partner)').prop('disabled',true);
                $('#UserPartnerEdit').find(':button:not(#btn-edit-partner)').hide();
                $.ajax({
                     url: "<?php echo $this->webroot;?>user_partners/edit",
                      success: function(result){
                        pedit = 0;
                        $('#partner').html(result);
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

    var num_area3 = <?php echo $len; ?>;
    var order_object3 = "<?php echo $len; ?>";

    function replaceAll(find, replace, str) {
      return str.replace(new RegExp(find, 'g'), replace);
    }

    $('#btn-add-relation').on('click', function() {
      var kana_script = '$(this).autoKana("#r_first_name_'+　order_object3 +'", "#r_first_name_kana_'+　order_object3 +'", {katakana:true, toggle:false});'
      kana_script += '$(this).autoKana("#r_last_name_'+　order_object3 +'", "#r_last_name_kana_'+　order_object3 +'", {katakana:true, toggle:false});'
      kana_script += '$(this).autoKana("#r_company_'+　order_object3 +'", "#r_school_'+　order_object3 +'", {katakana:true, toggle:false});'
      
      if( num_area3 < 5 ){
       var area = $('#relation-area-content').clone();
        area.html(area.html().replace(/\[0\]/g, '['+ order_object3 + ']' ).replace(/_0/g, '_'+ order_object3));
        area.find("input").val('');
        var btn_remove = $('#remove').clone();
        btn_remove.find('a').show();
        area.find("section").show();
        $('<script>' + kana_script +'</' + 'script>').appendTo(area);    
        $('#relation-area').append(area);
        $('#UserPartnerEdit').validate();
        $("[id^='r_phone']").each(function() {
          $(this).rules("add", 
          { 
            number: true,
            phone_number: "^0[0-9]{9}"
          });
        });
        order_object3++;
        num_area3++;
        if(num_area3 == 5){
          $('#btn-add-relation').hide();
        }
      }
      else {
        alert('Cannot add more item');
      }
    });

    function _remove_relation (obj) {
      num_area3--; 
      obj.parent().parent().parent().parent().remove();
      $('#btn-add-relation').show();
    }

    $.validator.addMethod(
      "phone_number",
      function(value, element, regexp) {
          var re = new RegExp(regexp);
          return this.optional(element) || re.test(value);
      },
      "携帯電話を正しく入力してください。"
    );
  
  $("#UserPartnerEdit").validate({
    rules: {
      'data[UserPartner][phone]': {
        number: true,
        phone_number: "^0[0-9]{9}"
      },
      'data[UserPartner][company_post_num_1]': {
        number: true,
        minlength: 3,
        maxlength: 3
      },
      'data[UserPartner][company_post_num_2]': {
        number: true,
        minlength: 4,
        maxlength: 4
      },
      'data[UserPartner][company_phone]': {
        number: true,
        maxlength: 10,
        phone_number: "^0[0-9]{9}"
      },
      'data[UserPartner][company_fax]': {
        number: true,
        maxlength: 10
      },
      'data[UserPartner][salary_type_other]': {
        required: {
          depends: function() {
            return $('input[name="data[UserPartner][salary_type]"]:checked').val() == '4';
          }
        },
        number: true     
      },
      'data[UserPartner][salary_date]': {
        required: {
          depends:  function() {
            return $('input[name="data[UserPartner][salary_receive_id]"]:checked').val() == '3';
          }
        },
        number: true
      },
      'data[UserPartner][year_worked]': {number: true},
      'data[UserPartner][month_worked]': {number: true},
      'data[UserPartner][income_month]': {number: true},
      'data[UserPartner][income_year]': {number: true},
      'data[UserRelation][0][phone]': {number: true}
    },
    messages: {
      'data[UserPartner][salary_type_other]': {required: "<?php echo __('global.errors.required'); ?>"},
      'data[UserPartner][salary_date]': {required: "<?php echo __('global.errors.required'); ?>"},
      'data[UserPartner][company_phone]': {maxlength: "<?php echo __('global.errors.maxlength_10'); ?>"},
      'data[UserPartner][company_fax]': {maxlength: "<?php echo __('global.errors.maxlength_10'); ?>"}
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
        var url = "<?php echo $this->webroot;?>user_partners/edit";
        $.ajax({
         type: "POST",
         url: url,
         data: $("#UserPartnerEdit").serialize(),
         success: function(result)
         {
             pedit = 0;
             $('#partner').html(result);
             $.ajax({
               url: "<?php echo $this->webroot?>users/reload_dashboard",
                success: function(result){
                  $('#home').html(result);
                }
            });
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
