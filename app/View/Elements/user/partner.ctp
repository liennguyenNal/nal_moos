<style type="text/css">
  .error-message {
    color: red;
    padding-left: 10px;
  }
</style>
<div class="page-header">
    <?php echo $this->element('flash');?>

    <div class="row">
      <div class="col-lg-12">
        <?php echo $this->Form->create("User", array('action'=>'edit','id'=>'UserPartnerEdit' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after' ) ) ) ) ?>
        <div class="well bs-component">
       
         <!--  <form class="form-horizontal"> -->
           
            <fieldset>
              <legend>会員登録フォ一ム</legend>
              <table class="table table-striped table-hover ">
              <tr>
                <td>
                  <label>申込人氏名<span style="color:red">*</span></label>
                </td>
                <td>
                  <div class="form-group">
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('UserPartner.first_name', array('type'=>'text', 'id'=>"p_first_name", 'label'=>"姓", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px' , 'div'=>false, 'required' => false))?>
                   
                      <?php echo $this->Form->input('UserPartner.last_name', array('type'=>'text', 'id'=>"p_last_name", 'label'=>"名", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', 'div'=>false, 'required' => false))?>
                    </div>
                  </div>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('UserPartner.first_name_kana', array('type'=>'text', 'id'=>"p_first_name_kana", 'label'=>"セイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', 'div'=>false, 'required' => false))?>              
                                       
                      <?php echo $this->Form->input('UserPartner.last_name_kana', array('type'=>'text', 'id'=>"p_last_name_kana", 'label'=>"メイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', 'div'=>false, 'required' => false))?>
                    </div>
                  </div>
                </td>
                <script type="text/javascript">
                    $(this).autoKana('#p_first_name', '#p_first_name_kana', {katakana:false, toggle:false});
                    $(this).autoKana('#p_last_name', '#p_last_name_kana', {katakana:false, toggle:false});
                  </script>
              </tr>
             <tr>
               <td> <label >性的<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                  
                    <div class="col-lg-10">
                      <?php 
                      echo $this->Form->radio('UserPartner.gender', array('male'=>"男性",'female'=> "女性"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'required' => false));
                    ?>  
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td> <label >生年月日<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                   
                    <div class="col-lg-10">
                      
                      年
                      <?php 
                      $years = array_combine(  range(1930, date("Y")), range(1930, date("Y")));
                      echo $this->Form->select('UserPartner.year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'p-year', 'onchange'=>'calculate_p_age()', 'required' => false));
                    ?>
                    月
                    <?php 
                      $months = array_combine(range(1, 12), range(1, 12));
                      echo $this->Form->select('UserPartner.month_of_birth', $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month', 'required' => false));
                    ?>
                    日
                    <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                      echo $this->Form->select('UserPartner.day_of_birth', $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day', 'required' => false));
                    ?>
                      歳 : <span id="p-age">0</span>
                    <script type="text/javascript">
                    var d = new Date();
                      var n = d.getFullYear();
                      $("#p-age").html(n - $("#p-year").val());
                    function calculate_p_age(){
                      
                      $("#p-age").html(n - $("#p-year").val());
                    }
                    </script>
                    </div>
                  </div>
                </td>
              </tr>
              
               </table>
            </fieldset>
       </div>
       
        <div class="well bs-component">
           
            <fieldset>
              <legend>Contact</legend>
              <table class="table table-striped table-hover ">
               
                 
                <tr>
                  <td><label for="phone">電話番号<span style="color:red">*</span></label></td>
                  <td>
                    <div class="form-group">
                      
                      <div class="col-lg-10">
                        <?php echo $this->Form->input('UserPartner.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
                     
                        
                      </div>
                    </div>
                    </td>
                  </tr>
                  
              </table>
            </fieldset>
        </div>
              

             

        <div class="well bs-component">


             <legend>Company</legend>
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">職業<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                   
                    <?php 
                    echo $this->Form->select('UserPartner.work_id', $works, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'正社貝'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Company Name</label>
                  <div class="col-lg-10">
                  Hira
                    <?php echo $this->Form->input('UserPartner.company', array('type'=>'text', 'id'=>"p-company-name", 'label'=>false, 'class'=>'form-control', 'display:inline', 'div'=>false, 'required' => false, 'required' => false))?>
                    Kana
                    <?php echo $this->Form->input('UserPartner.company_kana', array('type'=>'text', 'id'=>"p-company-name-kana", 'label'=>false, 'class'=>'form-control', 'style'=>'display:inline', 'div'=>false, 'required' => false))?>
                  </div>
                </div>
                
                <script type="text/javascript">
                     $(this).autoKana('#p-company-name', '#p-company-name-kana', {katakana:false, toggle:false});
                </script>
               
                    
            <table class="table table-striped table-hover ">
              <tr>
                <td><label for="inputEmail" >Company Address<span style="color:red">*</span></td>
                <td>
                  <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">〒</label>
                  <div class="col-lg-10" >
                    <?php echo $this->Form->input('UserPartner.company_post_num_1', array('type'=>'text', 'id'=>"p_company_post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , 'div'=>false, 'required' => false))?>
                    <?php echo $this->Form->input('UserPartner.company_post_num_2', array('type'=>'text', 'id'=>"p_company_post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , 'div'=>false, 'required' => false))?>
                    <button type="button" class="btn btn-primary" id="btn-partner-company-address">郵使番号から住所を検索</button>
                    <img id="c-loader" style="vertical-align: middle; display: none" src="<?php echo $this->webroot;?>images/loader.gif" />
                    <script type="text/javascript">
                      $('#btn-partner-company-address').on('click', function() {
                           var loader = $('#c-loader');
                          
                            loader.show();
                           // alert($('#post_num_1').val().trim() + $('#post_num_2').val().trim());
                          $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#p_company_post_num_1').val().trim() + $('#p_company_post_num_2').val().trim()}, 
                            function(json) {
                              loader.hide();
                              $("#p_company_pref_id").val(json.pref_id);
                              $("#p_company_city").val(json.ward);
                              $("#p_company_address").val(json.addr1);
                          });
                      });
                    </script>

                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">都道府県</label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->select('UserPartner.company_pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'p_company_pref_id', 'empty'=>'青森県', 'required' => false));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">市区町村</label>
                  <div class="col-lg-10">
                    <?php 
                      echo $this->Form->input('UserPartner.company_city', array('type'=>'text', 'id'=>"p_company_city", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required' => false));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">番地</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_address', array('type'=>'text', 'id'=>"p_company_address", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">建物</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_house_name', array('type'=>'text', 'id'=>"p_company_house_name", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false, 'required' => false))?>
                  </div>
                </div>
                </td>
              </tr>
              </table>

                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Phone</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Fax</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>
                

                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">職業</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->select('UserPartner.career_id', $careers, array('class'=>'form-control','div'=>false, 'label'=>false, 'id'=>'p_carrer_id', 'empty'=>'青森県', 'required' => false));?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Description</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_job_desc', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Department</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>

               <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Position</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.company_position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">働続年数</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 年' , 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required' => false))?>
                    <?php echo $this->Form->input('UserPartner.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 月', 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required' => false))?>
                  </div>
                </div>
               
               
                <div class="form-group">
                   <label for="inputEmail" class="col-lg-2 control-label">Salary Type</label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('UserPartner.salary_type', array('1'=>"固定給",'2'=> "一部歩合制 ", '3'=>"完全歩合制", "4"=>"その他" ), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'onchange'=>'p_change_type($(this))', 'required' => false));
                    echo $this->Form->input('UserPartner.salary_type_other', array('type'=>'text', 'id'=>"p_salary_type_other", 'label'=>false, 'class'=>'form-control','div'=>false, 'disabled'=>true, 'style'=>'width:150px; display:inline' , 'required' => false))
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
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Salary Month</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.income_month', array('type'=>'text', 'id'=>"salary_month", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>円
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Salary Year</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.income_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'form-control','div'=>false, 'required' => false))?>円
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">給料日</label>
                  <div class="col-lg-10">
                    <?php 
                      echo $this->Form->radio('UserPartner.salary_receive_id', array('1'=>"日払い",'2'=> "週払い", '3'=>'月払い'), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'required' => false));
                      echo $this->Form->input('UserPartner.salary_date', array('type'=>'text', 'id'=>"salary_date", 'label'=>'日', 'class'=>'form-control','div'=>false, 'style'=>'width:150px; display:inline', 'required' => false ))
                    ?>  
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">健康保険種別<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                   
                    <?php 
                    echo $this->Form->select('UserPartner.insurance_id', $insurances, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'正社貝'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Note</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserPartner.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                  </div>
                </div>
                 <?php echo $this->Form->hidden('UserPartner.id')?>
              </fieldset>
          </div>
           
            <?php echo $this->element('/user/relation');?>
           
        
          
              <?php echo $this->Form->hidden('UserPartner.is_confirm', array('value'=> $is_confirm, 'id'=>'partner_id'))?>
              <?php if($user['User']['status_id'] == 2){?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary" id="btn-confirm-partner" >Confirm</button>
                  <button type="button" class="btn btn-primary" id="btn-save-partner" >Save</button>
                  <button type="button" class="btn btn-default" id="btn-cancel-partner" >Cancel</button>
                </div>
              </div>
               <?php }
              else {?>
                <script type="text/javascript" charset="utf-8" async defer>
                $('#UserPartnerEdit').find(':button').hide();
                $('#UserPartnerEdit').find(':input').prop('disabled',true);
                </script>
              <?php }?>
               
                <script type="text/javascript" >
                <?php if($is_confirm == 1){?>
                  $('#btn-confirm-partner').hide();
                  $('#btn-save-partner').show();
                  $('#btn-cancel-partner').show();
                  $('#UserPartnerEdit').find(':button:not(#btn-save-partner):not(#btn-cancel-partner)').hide();
                  $('#UserPartnerEdit').find(':input:not(:disabled):not(:hidden):not(#btn-save-partner):not(#btn-cancel-partner)').prop('disabled',true);
                <?php }else {?>
                   $('#btn-confirm-partner').show();
                  $('#btn-save-partner').hide();
                  $('#btn-cancel-partner').hide();
                <?php } ?>    

                  
                   $('#btn-cancel-partner').on('click', function() {
                      $('#UserPartnerEdit').find(':input:not(#btn-save-partner):not(#btn-cancel-partner)').prop('disabled',false);
                      $('#btn-cancel-partner').hide();
                      $('#btn-save-partner').hide();
                      $('#btn-confirm-partner').show();
                      $('#UserPartnerEdit').find(':button:not(#btn-save-partner):not(#btn-cancel-partner)').show();
                      $('#partner_id').val("");

                   });
                  $('#btn-save-partner').on('click', function(){
                      $.ajax({
                        url: "<?php echo $this->webroot?>user_partners/edit", 
                        'method':'POST',
                        'data':"data[UserPartner][is_confirm]=1",
                        success: function(result){
                          $("#partner").html(result);
                          $.ajax({
                             url: "<?php echo $this->webroot?>users/reload_dashboard",
                              success: function(result){
                                $('#home').html(result);
                              }
                          });
                    }});
                  });
                </script>
                 
           

        </form>

        <?php
      // JsHelper should be loaded in $helpers in controller
      // Form ID: #ContactsContactForm
      // Div to use for AJAX response: #contactStatus
      $data = $this->Js->get('#UserPartnerEdit')->serializeForm(array('isForm' => true, 'inline' => true));
      $this->Js->get('#UserPartnerEdit')->event(
         'submit',
         $this->Js->request(
          array('action' => 'edit', 'controller' => 'user_partners'),
          array(
              'update' => '#partner',
              'data' => $data,
              'async' => true,    
              'dataExpression'=>true,
              'method' => 'POST'
          )
        )
      );
      echo $this->Js->writeBuffer(); 
      ?>
        
      </div>
      
    </div>
  </div>
