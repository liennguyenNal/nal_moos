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
                    <td class="label-text"><label><?php echo __('user.register.username'); ?></label></td>
                    <td>
                      <div class="block-input">
                        <div class="div-style">
                          <span class="w-auto"><?php echo __('user.register.firstname'); ?></span>
                          <?php echo $this->Form->input('UserPartner.first_name', array('type'=>'text', 'id'=>"p_first_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required' => false, 'data-placement'=>'right', 'placeholder'=>'例）山田'))
                          ?>
                        </div>
                        <div class="div-style">
                          <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
                          <?php echo $this->Form->input('UserPartner.last_name', array('type'=>'text', 'id'=>"p_last_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required' => false, 'data-placement'=>'right', 'placeholder'=>'太郎'))
                          ?>
                        </div>
                      </div>
                      <div class="block-input">
                        <div class="div-style">
                          <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
                          <?php echo $this->Form->input('UserPartner.first_name_kana', array('type'=>'text', 'id'=>"p_first_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required' => false, 'data-placement'=>'right', 'placeholder'=>'ヤマダ'))
                          ?>
                        </div>
                        <div class="div-style">
                          <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
                          <?php echo $this->Form->input('UserPartner.last_name_kana', array('type'=>'text', 'id'=>"p_last_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required' => false, 'data-placement'=>'right', 'placeholder'=>'タロウ'))
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
                    <td class="label-text"><label><?php echo __('user.register.gender') ?></label></td>
                    <td>
                      <div class="form-radio">
                        <div class="form-w">
                          <div class="block-input-radio">
                            <?php 
                              echo $this->Form->radio('UserPartner.gender', array('male'=>__('user.register.male'),'female'=>__('user.register.female')), array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"female", 'required' => false, 'data-placement'=>'right'));
                            ?>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="label-text"><label><?php echo __('user.register.birthday'); ?></label></td>
                    <td>
                      <div class="select">
                        <?php 
                          $years = array_combine(  range(1900, date("Y")), range(1900, date("Y")));
                          echo $this->Form->select('UserPartner.year_of_birth', $years, array('div'=>false, 'label'=>false, 'id'=>'p_year', 'onchange'=>'p_calculate_age()', 'required' => false, 'data-placement'=>'right', 'empty'=>'----'));
                        ?>
                        <span><?php echo __('user.register.year'); ?></span>
                        <?php 
                          $months = array_combine(range(1, 12), range(1, 12));
                          echo $this->Form->select('UserPartner.month_of_birth', $months, array('div'=>false, 'label'=>false, 'id'=>'p_month', 'required' => false, 'data-placement'=>'right', 'empty'=>'--', 'onchange'=>'p_calculate_age()'));
                        ?>
                        <span><?php echo __('user.register.month'); ?></span>
                        <?php 
                          $dates = array_combine(range(1, 31), range(1, 31));
                            echo $this->Form->select('UserPartner.day_of_birth', $dates, array('div'=>false, 'label'=>false, 'id'=>'p_day', 'required' => false, 'data-placement'=>'right', 'empty'=>'--', 'onchange'=>'p_calculate_age()'));
                        ?>
                        <span><?php echo __('user.register.day'); ?></span>
                        <span class="style" id="p_age">0</span>
                        <span class="style"><?php echo __('user.register.age'); ?></span>
                        <script type="text/javascript">
                                 

                            p_calculate_age();
                            function p_calculate_age(){
                                if($('#p_year').val() && $('#p_month').val() && $('#p_day').val()){                               
                                age = calculateAge($('#p_year').val(), $('#p_month').val(), $('#p_day').val() );
                                
                              }
                              else {
                                age = "";
                              }

                              $("#p_age").html(age);

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
                    <td class="label-text"><label><?php echo __('user.partner.phone'); ?></label></td>
                    <td>
                      <div class="block-input">
                        <?php echo $this->Form->input('UserPartner.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'例）09012345678'))
                        ?>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        <div class="title-tab title-tab-fix-mb title-tab-fix-mt">
          <h3>配偶者勤務先情報</h3>
        </div>

          <div class="content-from-how">
            <table class="from">
              <tbody>
                <tr>
                  <td class="label-text"><label><?php echo __('user.register.work'); ?></label></td>
                  <td>
                    <div class="select">
                      <?php 
                        echo $this->Form->select('UserPartner.work_id', $works, array('class'=>'w198','div'=>false, 'label'=>false, 'id'=>'p_work_id', 'empty'=>'--------', 'required' => false, 'onchange'=>'show_p_company_required_field()'));
                      ?>
                    </div>
                  </td>
                </tr> 
                <tr>
                  <td class="label-text"><label><?php echo __('user.partner.company'); ?></label></td>
                  <td>
                    <div class="block-input">
                      <span class="w78"><?php echo __('user.my_page.basic_info.company_name'); ?></span>
                      <?php echo $this->Form->input('UserPartner.company', array('type'=>'text', 'id'=>"p-company-name", 'label'=>false, 'class'=>'w198',  'div'=>false, 'required' => false, 'data-placement'=>'right', 'placeholder'=>'例）株式会社ヤチンデモラエル'))
                      ?>
                    </div>
                    <div class="block-input">
                      <span class="w78"><?php echo __('user.my_page.basic_info.company_name_kana'); ?></span>
                      <?php echo $this->Form->input('UserPartner.company_kana', array('type'=>'text', 'id'=>"p-company-name-kana", 'label'=>false, 'class'=>'w198',  'div'=>false, 'required' => false, 'data-placement'=>'right', 'placeholder'=>'カブシキガイシャヤチンデモラエル'))
                      ?>
                    </div>
                    <script type="text/javascript">
                      $(this).autoKana('#p-company-name', '#p-company-name-kana', {katakana:true, toggle:false});
                    </script>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.basic_info.company'); ?></label></td>
                  <td>
                    <div class="block-input">
                      <span class="w-auto1"><?php echo __('user.register.post'); ?></span>
                      <?php echo $this->Form->input('UserPartner.company_post_num_1', array('type'=>'text', 'id'=>"p_company_post_num_1", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'101'))
                      ?>
                      <span class="w-auto1">-</span>
                      <?php echo $this->Form->input('UserPartner.company_post_num_2', array('type'=>'text', 'id'=>"p_company_post_num_2", 'label'=>false, 'class'=>'w80', 'div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'0000'))
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
                        echo $this->Form->input('UserPartner.company_city', array('type'=>'text', 'id'=>"p_company_city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required' => false, 'data-placement'=>"right", 'maxlength'=>false, 'placeholder'=>'千代田区神田多町'));
                      ?>
                    </div>
                    <div class="block-input">
                      <span class="w78"><?php echo __('user.register.street'); ?></span>
                      <?php echo $this->Form->input('UserPartner.company_address', array('type'=>'text', 'id'=>"p_company_address", 'label'=>false, 'class'=>'w198','div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'2-14-17'))
                      ?>
                    </div>
                    <div class="block-input">
                      <span class="w78"><?php echo __('user.register.house'); ?></span>
                      <?php echo $this->Form->input('UserPartner.company_house_name', array('type'=>'text', 'id'=>"p_company_house_name", 'label'=>false, 'class'=>'w198', "placeholder"=>'グレイス高輪ビル８階','div'=>false, 'required' => false, 'data-placement'=>"right"))
                      ?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.contact.company-phone'); ?></label></td>
                  <td>
                    <div class="block-input fix-padding">
                      <div class="div-style">
                        <?php echo $this->Form->input('UserPartner.company_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'例）09012345678'))
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
                        <?php echo $this->Form->input('UserPartner.company_fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'例）0312345678'))
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
                  <?php echo $this->Form->input('UserPartner.company_job_desc', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'例）病院での薬剤師(医療事務)業務、建設会社での営業(設土木作業)業務など'))
                  ?>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.department'); ?></label></td>
                  <td><?php echo $this->Form->input('UserPartner.company_department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'例）営業部 第一営業課'))

                  ?>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.position'); ?></label></td>
                  <td>
                  <?php echo $this->Form->input('UserPartner.company_position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'例）部長、課長、次長、係長、主任など'))
                  ?>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.register.experience'); ?></label></td>
                  <td>
                    <div class="block-input">
                      <?php echo $this->Form->input('UserPartner.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'00'))
                      ?>
                      <span class="w-auto1"><?php echo __('user.register.year'); ?></span>
                      <?php echo $this->Form->input('UserPartner.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40',  'div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'00'))
                      ?>
                      <span class="w-auto1"><?php echo __('user.landing-page.month'); ?></span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_type'); ?></label></td>
                  <td>
                    <div class="form-radio">
                      <div class="form-w">
                        <div class="block-input-radio">
                          <?php 
                            echo $this->Form->radio('UserPartner.salary_type', array('1'=>__('user.my_page.basic_info.salary_fix'),'2'=>__('user.my_page.basic_info.salary_bonus'), '3'=>__('user.my_page.basic_info.salary_product'), "4"=>__('global.other')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'id'=>'salary_type', 'onchange'=>'p_change_type($(this))', 'data-placement'=>'right'));
                          ?>
                        <script type="text/javascript">
                            function p_change_type(obj){
                                if(obj.val() == '4')
                                $('#p_salary_type_other').prop('disabled',false);
                                else {
                                  $('#p_salary_type_other').val("").prop('disabled',true);
                                }
                            }
                        </script>  
                      </div>
                        <?php 
                            echo $this->Form->input('UserPartner.salary_type_other', array('type'=>'text', 'id'=>"p_salary_type_other", 'label'=>false, 'class'=>'w40 input-style fix-pd','div'=>false, 'disabled'=> $user['UserPartner']['salary_type'] != 4, 'data-placement'=>'right', 'style'=>'width: 100px', 'required'=>false))
                        ?>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.register.tax'); ?></label></td>
                  <td>
                    <div class="block-input">
                      <?php echo $this->Form->input('UserPartner.income_month', array('type'=>'text', 'id'=>"p_income_month", 'label'=>false, 'class'=>'w108','div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'000,000'))
                      ?>
                      <span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_year'); ?></label></span></td>
                  <td>
                    <div class="block-input">
                      <?php echo $this->Form->input('UserPartner.income_year', array('type'=>'text', 'id'=>"p_income_year", 'label'=>false, 'class'=>'w108','div'=>false, 'required' => false, 'data-placement'=>"right", 'placeholder'=>'000,000'))
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
                          echo $this->Form->radio('UserPartner.salary_receive_id', array('1'=>__('user.my_page.basic_info.salary_day'),'2'=> __('user.my_page.basic_info.salary_week'), '3'=>__('user.my_page.basic_info.salary_month')), array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"3", 'data-placement'=>'right', 'id'=>'salary_receive', 'onchange'=>'p_change_type_date($(this))')); 
                        ?>
                        </div>
                        <script type="text/javascript">
                          function p_change_type_date(obj){
                              if(obj.val() == '3')
                              $('#p_salary_date').prop('disabled',false);
                              else {
                                $('#p_salary_date').val("").prop('disabled',true);
                              }
                          }
                      </script>
                        <div class="style-a">
                          <label ><?php echo __('user.my_page.basic_info.salary_date'); ?></label>
                          <?php echo $this->Form->input('UserPartner.salary_date', array('type'=>'text', 'id'=>"p_salary_date", 'label'=>false, 'class'=>'w40','div'=>false, 'placeholder'=>'25', 'required' => false, 'data-placement'=>"right", 'disabled'=> $user['UserPartner']['salary_receive_id'] != 3 ))
                          ?> 
                          <label><?php echo __('global.date'); ?></label>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="label-text"><label><?php echo __('user.my_page.basic_info.insurances'); ?></label></td>
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
            <script type="text/javascript">
                show_p_company_required_field();
               //function check required
               function show_p_company_required_field(){
                  
               }
               function calculate_relation_age(i){
                
                  if($("#p_year_"+i).val() && $("#p_month_" + i).val()&& $("#p_day_"+i).val() ){
                    $("#p_age_" + i).html(calculateAge($("#p_year_"+i).val(), $("#p_month_" + i).val(), $("#p_day_"+i).val() ));
                  }
                  else {
                    $("#p_age_" + i).html("");
                  }
                }
          </script>
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
                <div class="link-form" >
                    <div class="block-link">
                        <a href="javascript:void(0)" class="style-b" id='btn-remove-relation' onclick="javascript:_remove_relation($(this));"><?php echo __('user.partner.button.remove'); ?></a>
                    </div>
                </div>
            </section>
            <?php if($i> 0){?>
            <section>
              <div class="link-form" >
                    <div class="block-link">
                        <a href="javascript:void(0)" class="style-b" id='btn-remove-relation' onclick="javascript:_remove_relation($(this));"><?php echo __('user.partner.button.remove'); ?></a>
                    </div>
                </div>
            </section>
            <?php } ?>
            <div class="content-from-block" >
              <div class="content-from-how">
                <table class="from" id="theform">
                  <tbody>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.partner.name'); ?></label><span class="required"><?php echo __('global.require'); ?></span></td>
                      <td>
                        <div class="block-input">
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.firstname'); ?></span>
                            <?php echo $this->Form->input("UserRelation.$i.first_name", array('type'=>'text', 'id'=>"r_first_name_$i", 'label'=>false, 'class'=>'w198' ,'div'=>false, 'data-placement'=>"right", 'required'=>false, 'placeholder'=>'例）山田'))
                            ?>
                          </div>
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
                            <?php echo $this->Form->input("UserRelation.$i.last_name", array('type'=>'text', 'id'=>"r_last_name_$i", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right", 'required'=>false, 'placeholder'=>'太郎'))
                            ?>
                          </div>
                        </div>
                        <div class="block-input">
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
                            <?php echo $this->Form->input("UserRelation.$i.first_name_kana", array('type'=>'text', 'id'=>"r_first_name_kana_$i", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right", 'required'=>false, 'placeholder'=>'ヤマダ'))
                            ?>
                          </div>
                          <div class="div-style">
                            <span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
                            <?php echo $this->Form->input("UserRelation.$i.last_name_kana", array('type'=>'text', 'id'=>"r_last_name_kana_$i", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right", 'required'=>false, 'placeholder'=>'タロウ'))
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.register.gender'); ?></label><span class="required"><?php echo __('global.require'); ?></span></td>
                      <td>
                        <div class="form-radio">
                          <div class="form-w">
                            <div class="block-input-radio">
                              <?php 
                                echo $this->Form->radio("UserRelation.$i.gender", array('male'=>__('user.register.male'),'female'=>__('user.register.female')), array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"female", 'data-placement'=>'right', 'required'=>false));
                              ?>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.register.birthday'); ?></label><span class="required"><?php echo __('global.require'); ?></span></td>
                      <td>
                        <div class="select">
                          <?php 
                            $years = array_combine(  range(1900, date("Y")), range(1900, date("Y")));
                            echo $this->Form->select("UserRelation.$i.year_of_birth", $years, array('div'=>false, 'label'=>false, 'id'=>"p_year_$i", 'onchange'=>"calculate_relation_age($i)", 'data-placement'=>'right', 'required'=>false, 'empty'=>'----'));
                          ?>
                          <span><?php echo __('user.register.year'); ?></span>
                          <?php 
                            $months = array_combine(range(1, 12), range(1, 12));
                            echo $this->Form->select("UserRelation.$i.month_of_birth", $months, array('div'=>false, 'label'=>false, 'id'=>"p_month_$i", 'data-placement'=>'right', 'required'=>false, 'empty'=>'--', 'onchange'=>"calculate_relation_age($i)"));
                          ?>
                          <span><?php echo __('user.register.month'); ?></span>
                          <?php 
                          $dates = array_combine(range(1, 31), range(1, 31));
                            echo $this->Form->select("UserRelation.$i.day_of_birth", $dates, array('div'=>false, 'label'=>false, 'id'=>"p_day_$i", 'data-placement'=>'right', 'required'=>false, 'empty'=>'--', 'onchange'=>"calculate_relation_age($i)"));
                          ?>
                          <span><?php echo __('user.register.day'); ?></span>
                          <span class="style" id="p_age_<?php echo $i?>">0</span>
                          <span class="style"><?php echo __('user.register.age'); ?></span>
                          <script type="text/javascript">
                              // var d = new Date();
                              // var n = d.getFullYear();
                              // if ($("#p-year-<?php echo $i?>").val() != "" && $("#p-month-<?php echo $i?>").val() != "" && $("#p-day-<?php echo $i?>").val() != "") {
                              //   $("#p-age-<?php echo $i?>").html(calculateAge($("#p-year-<?php echo $i?>").val(), $("#p-month-<?php echo $i?>").val(), $("#p-day-<?php echo $i?>").val() ));
                              // } else {
                              //   $("#p-age-<?php echo $i?>").html("");
                              //   //$("#p-age-<?php echo $i?>").html("<?php echo date('Y') - $user['UserRelation'][$i]['year_of_birth'] ?>");
                              // }
                              calculate_relation_age(<?php echo $i;?>);
                          </script>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.my_page.guarantor.relationship'); ?></label><span class="required"><?php echo __('global.require'); ?></span></td>
                      <td>
                        <div class="block-input">
                          <?php echo $this->Form->input("UserRelation.$i.relate", array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>"right", "required"=>false, 'placeholder'=>'例）長男、次女、父、母、叔父など'))
                          ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="label-text"><label><?php echo __('user.partner.phone'); ?></label></td>
                      <td>
                        <div class="block-input fix-padding">
                          <div class="div-style">
                            <?php echo $this->Form->input("UserRelation.$i.phone", array('type'=>'text', 'id'=>"r_phone", 'label'=>false, 'class'=>'w198', 'div'=>false,  'required'=>false, 'data-placement'=>"right", 'placeholder'=>'例）09012345678'))
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
                          <?php echo $this->Form->input("UserRelation.$i.company", array('type'=>'text', 'id'=>"r_company_$i", 'class'=>'w198', 'div'=>false, 'required'=>false,'label'=>false, 'data-placement'=>"right", 'placeholder'=>'例）株式会社ヤチンデモラエル'))
                          ?>
                        </div>
                        <div class="block-input">
                          <span class="w108"><?php echo __('user.my_page.basic_info.company_name_kana'); ?></span>
                          <?php echo $this->Form->input("UserRelation.$i.school", array('type'=>'text', 'id'=>"r_school_$i",  'class'=>'w198', 'div'=>false,'label'=>false, 'required'=>false, 'data-placement'=>"right", 'placeholder'=>'カブシキガイシャヤチンデモラエル'))
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
                <a href="javascript:void(0)" class="style-link" id='btn-add-relation'><?php echo __('user.partner.button.add') ?></a>
              </div>
            </div>
          <!-- END RELATIONSHIP -->

          <?php echo $this->Form->hidden('UserPartner.id')?>

          <?php echo $this->Form->hidden('Partner.is_confirm', array('value'=> 1, 'id'=>'user-info-id'))?>

           <?php echo $this->Form->hidden('Partner.is_confirm', array('value'=> 1, 'id'=>'user-info-id'))?>

          <?php if($user['User']['status_id'] == 2){?>
          <div class="button-tab">
            <button type="button" class="link-tab-1a" id="btn-edit-partner"><img src="<?php echo $this->webroot; ?>img/front/change.png" alt="変更する"></button>
            <button type="submit" class="link-tab-1a" id="btn-save-partner"><img src="<?php echo $this->webroot; ?>img/front/save-b.png" alt="Save"></button>
            <button type="button" class="link-tab-1b" id="btn-cancel-partner"><img src="<?php echo $this->webroot; ?>img/front/Cancel.png" alt="Cancel"></button>
          </div>
           <?php } else { ?>
          <script type="text/javascript" charset="utf-8" async defer></script>
          <?php } ?>
                  
        <!-- MAIN SCRIPT -->         
        <script type="text/javascript" >
            //var pedit;
            $( document ).ready(function() {
              if(p_edit != 1){
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

                $('#p_salary_type_other').prop('disabled', $('input[name="data[UserPartner][salary_type]"]:checked').val() != 4);
                $('#p_salary_date').prop('disabled', $('input[name="data[UserPartner][salary_receive_id]"]:checked').val() != "3");

                p_edit = 1;
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
                        p_edit = 0;
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
<?php if(!$user['User']['live_with_family']){?>
  <script>
    //alert(1111);
      $("#relation-area").find(".required").hide();
  </script>
  <?php }?>
             
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
       var area = $('#relation-area-content').clone(true, true);
       area.html(area.html().replace(/\[0\]/g, '['+ order_object3 + ']' ).replace(/_0/g, '_'+ order_object3).replace(/\-0/g, '-'+ order_object3).replace(/\(0\)/g, '('+ order_object3+')' ));
        //area.html(replaceAll('(0)', '('+order_object3 + ')' , area.html()));
        area.find("input").val('');
        area.find("select").val('');
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
            minlength: 11,
            maxlength: 11,
            phone_number: "^0[0-9]"
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
        maxlength: 11,
        minlength: 11,
        phone_number: "^0[0-9]"
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
        maxlength: 11,
        minlength: 10,
        phone_number: "^0[0-9]"
      },
      'data[UserPartner][company_fax]': {
        number: true,
        maxlength: 10,
        minlength: 10
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
        // required: {
        //   depends:  function() {
        //     return $('input[name="data[UserPartner][salary_receive_id]"]:checked').val() == '3';
        //   }
        // },
        number: true,
        min: 1,
        max: 30
      },
      'data[UserPartner][year_worked]': {number: true},
      'data[UserPartner][month_worked]': {number: true},
      'data[UserPartner][income_month]': {number: true},
      'data[UserPartner][income_year]': {number: true},
      'data[UserRelation][0][phone]': {
        number: true,
        minlength: 11,
        maxlength: 11,
        phone_number: "^0[0-9]"
      }
    },
    messages: {
      'data[UserPartner][phone]': {
        maxlength: "<?php echo __('global.errors.maxlength_11'); ?>",
        minlength: "<?php echo __('global.errors.minlength_11'); ?>"
      },
      'data[UserPartner][salary_type_other]': {required: "<?php echo __('global.errors.required'); ?>"},
      'data[UserPartner][salary_date]': {
        // required: "<?php echo __('global.errors.required'); ?>",
        min: "<?php echo __('global.errors.salary_date.min'); ?>",
        max: "<?php echo __('global.errors.salary_date.max') ?>"
      },
      'data[UserPartner][company_phone]': {
        maxlength: "<?php echo __('global.errors.company.phone'); ?>",
        minlength: "<?php echo __('global.errors.company.phone'); ?>"
      },
      'data[UserPartner][company_fax]': {
        maxlength: "<?php echo __('global.errors.maxlength_10'); ?>",
        minlength: "<?php echo __('global.errors.minlength_10'); ?>"
      },
      'data[UserPartner][company_post_num_1]': {
        minlength: "<?php echo __('global.errors.minlength_3'); ?>",
        maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
      },
      'data[UserPartner][company_post_num_2]': {
        minlength: "<?php echo __('global.errors.minlength_4'); ?>",
        maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
      },
      'data[UserRelation][0][phone]': {
        minlength: "<?php echo __('global.errors.minlength_11'); ?>",
        maxlength: "<?php echo __('global.errors.maxlength_11'); ?>"
      }
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
        $('#btn-save-partner').prop('disabled', true);
        var url = "<?php echo $this->webroot;?>user_partners/edit";
        $.ajax({
         type: "POST",
         url: url,
         data: $("#UserPartnerEdit").serialize(),
         success: function(result)
         {
             p_edit = 0;
             if(result != "0"){
               $('#partner').html(result);
               $.ajax({
                 url: "<?php echo $this->webroot?>users/reload_dashboard",
                  success: function(result){
                    $('#home').html(result);
                  }
              });
             }
             else window.location.href = "<?php echo $this->webroot?>users/login"
         }
       }).done(function() {
             $('#btn-save-partner').prop('disabled', false);
            });
            return false;
        }
  });
  jQuery.extend(jQuery.validator.messages, {
      number: "<?php echo __('global.errors.number'); ?>"
  });

  
  $('#p_income_month').autoNumeric('init', {aNum: '0123456789',mRound: 'CHF'});  
  $('#p_income_year').autoNumeric('init', {aNum: '0123456789',mRound: 'CHF'});      
 
</script>

<!-- END SCRIPT VALIDATION -->
